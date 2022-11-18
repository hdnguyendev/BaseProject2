<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class ClientController extends Controller
{
    private $client_model;
    private $comment_model;

    public function __construct()
    {
        $this->client_model = new Client();
        $this->comment_model = new Comment();
    }
    public function userpage()
    {
        $client_id = Session::get("client_id");
        $result = $this->client_model->getData($client_id);
        return view('userpage')->with('data', $result);
    }
    public function detailpage($id){
        $comments = $this->comment_model->getCommentsbyMovieId($id);
        return view('detail', compact('id','comments'));
    }
    public function checkLogin(Request $request)
    {
        $client_account = $request->client_account;
        $client_password = md5($request->client_password);
        $result = $this->client_model->checkLogin($client_account, $client_password);
        if ($result) {
            if (!$result->client_status) {
                return view('login')->with('message', "TÀI KHOẢN CỦA BẠN ĐÃ BỊ CHẶN!");
            }
            Session::put("client_id", $result->client_id);
            Session::put("client_email", $result->client_email);
            Session::put("client_username", $result->client_username);
            Session::put("client_avatar", $result->client_avatar);
            return Redirect::to('/');
        } else {
            return view('login')->with('message', "Sai tk or mk");
        }
    }
    public function logout()
    {
        Session::forget("client_id");
        Session::forget("client_email");
        Session::forget("client_username");
        return view('login');
    }
    public function register(Request $request)
    {

        $request->validate([
            'client_name'     => 'required|max:255',
            'client_username' => 'required|max:100',
            'client_email'    => 'required|email',
            'client_password' => 'required|min:8|confirmed',

        ]);
        $data = array(
            $request->client_name,
            $request->client_email,
            $request->client_username,
            md5($request->client_password),
            "avt.jpeg",
            1
        );
        $result = $this->client_model->register($data);
        if ($result)
            return Redirect::to('login')->with('message', 'Register successfully. Welcome to Streamit');
        else
            return Redirect::to('login')->with('message', 'Register failed. Try again');
    }

    // public function update_profile(Request $request)
    // {
    //     $data = [$request->client_name, $request->client_email, $request->client_new_password, Session::get("client_id")];
    //     $this->client_model->update_profile($data);
    // }
    public function change_avatar(Request $request)
    {

        if ($request->hasFile('client_avatar')) {
            //Hàm kiểm tra dữ liệu
            $this->validate(
                $request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'client_avatar' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'client_avatar.mimes' => 'Chỉ chấp nhận hình với đuôi .jpg .jpeg .png .gif',
                    'client_avatar.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );

            //Lưu hình ảnh vào thư mục public/upload/client_avatar
            $client_avatar = $request->file('client_avatar');
            $div = explode('.', $client_avatar->getClientOriginalName());
            $file_ext = strtolower(end($div));
            $avatar_name_final = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $destinationPath = public_path('upload/avatars');
            $client_avatar->move($destinationPath, $avatar_name_final);
            $data = [$avatar_name_final, Session::get("client_id")];
            $this->client_model->changeAvatar($data);
            Session::put("client_avatar", $avatar_name_final);
            return Redirect::to('/user');
        }

    }
    public function change_password(Request $request)
    {
        $data = $this->client_model->getData(Session::get('client_id'));
        $old_password = $data->client_password;
        if (md5($request->old_password) != $old_password ) {
            return "Sai mật khẩu cũ. Vui lòng thử lại!";
        } else if ($request->new_password != $request->valid_password){
            return "Mật khẩu xác nhận không chính xác. Vui lòng thử lại!";
        } else if ($request->new_password == "" && $request->valid_password == "") {
            $data = [$request->name, $request->useremail, md5($request->old_password)];
            $result = $this->client_model->changeProfile($data);
            if ($result)
            return "Đổi thông tin cá nhân thành công!";
            else return "Đổi thông tin cá nhân thất bại!";
        } else {
            $data = [$request->name, $request->useremail, md5($request->new_password)];
            $result = $this->client_model->changeProfile($data);
            if ($result)
            return "Đổi thông tin cá nhân thành công!";
            else return "Đổi thông tin cá nhân thất bại!";
        }

    }
    public function add_comment(Request $request)
    {
        // $data = $this->client_model->getData(Session::get('client_id'));
        $client_id = Session::get('client_id');
        $data = [$request->movie_name, $request->comment_content,$request->comment_rating, $client_id];
        $result = $this->comment_model->addComment($data);
        return $result;

    }

}
