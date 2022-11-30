<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Comment;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

// session_start();

class AdminController extends Controller
{
    private Client $client_model;
    private Comment $comment_model;
    private Statistic $statistic_model;
    public function __construct()
    {
        $this->client_model = new Client();
        $this->comment_model = new Comment();
        $this->statistic_model = new Statistic();
    }

    public function index()
    {
        if (Session::get('admin_id') != null) {
            $data_views = $this->statistic_model->getDataViews();
            $total_views = $this->statistic_model->getTotalViews();
            $total_comments = $this->statistic_model->getTotalComments();
            $total_clients = $this->statistic_model->getTotalClients();
            return view('admin.pages.home', compact('total_clients','total_views','total_comments','data_views'));
        } else {
            return view('admin.login');
        }
    }
    public function sign_in()
    {
        if (Session::get('admin_id') == null) {
            return view('admin.login');
        } else return Redirect::to('/admin');
    }
    public function check_login(Request $request)
    {
        $admin_username = $request->username;
        $admin_password = md5($request->password);
        $result = DB::table('tbl_admin')->where('admin_username', $admin_username)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/admin');
        } else {
            Session::put('message', 'Username/password is wrong. Please try again!');
            return Redirect::to('/admin/login');
        }
    }
    public function logout()
    {
        Session::forget('admin_name');
        Session::forget('admin_id');
        return Redirect::to('/admin/login');
    }
    //
    public function clients_list()
    {
        if (Session::get('admin_id') == null) {
            return Redirect::to('/admin/login');
        } else{
            $data = $this->client_model->getAll_Paginite();
            return view('admin.pages.clients')->with('data', $data);
        }

    }
    public function comments_list()
    {
        if (Session::get('admin_id') == null) {
            return Redirect::to('/admin/login');
        } else{
        $data = $this->comment_model->getAll();
        return view('admin.pages.comments')->with('data', $data);}
    }
    public function ban_client($id)
    {
        $result = $this->client_model->ban($id);
        return redirect()->back();
    }
    public function unban_client($id)
    {
        $result = $this->client_model->unban($id);
        return redirect()->back();
    }
    public function change_status_comment($id)
    {
        $result = $this->comment_model->updateStatus([$id]);
        if ($result) {
            return "OK";
        } else return "NO";
    }
}
