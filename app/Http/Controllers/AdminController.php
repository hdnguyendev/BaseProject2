<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

// session_start();

class AdminController extends Controller
{
    private Client $client_model;
    public function __construct() {
        $this->client_model = new Client();
    }
    public function index()
    {
        if (Session::get('admin_id') != null) {
            return view('admin.pages.home');
        }
        else {
            return Redirect::to('admin/login');
        }
    }
    public function sign_in()
    {
        if (Session::get('admin_id') != null) {
            return Redirect::to('admin');
        } else {
            return view('admin.login');

        }
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
            return Redirect::to('admin/login');
        }
        return view('admin.pages.home');
    }
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return view('admin.login');
    }
    //
    public function clients_list()
    {
        $data = $this->client_model->getAll();
        return view('admin.pages.clients')->with('data', $data);
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

}
