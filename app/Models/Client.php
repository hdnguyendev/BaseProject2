<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;
    public function getAll()
    {
        $result = DB::table('tbl_client')->get();
        return $result;
    }
    public function getData($client_id)
    {
        $result = DB::table('tbl_client')->where("client_id", $client_id)->get()->first();
        return $result;
    }
    public function update_profile($data)
    {
        $result = DB::update('update tbl_client set client_name = ?, client_email = ?, client_password = ? where client_id = ?', $data);
    }
    public function checkLogin($account, $password)
    {
        $result = DB::table('tbl_client')->where('client_email', $account)->orWhere('client_username', $account)->where('client_password', $password)->first();
        return $result;
    }

    public function changeAvatar($data)
    {
        $result = DB::update('update tbl_client set client_avatar = ? where client_id = ?', $data);
        return $result;
    }
    public function changeProfile($data)
    {
        $result = DB::update('UPDATE tbl_client SET client_name = ?,  client_email = ?, client_password = ?', $data);
        return $result;
    }
    public function register($data)
    {
        $result = DB::insert('insert into tbl_client (client_name, client_email, client_username, client_password, client_avatar, client_status) values (?, ?, ?, ? , ? , ?)', $data);
        return $result;
    }
    public function ban($id)
    {
        $result = DB::update("update tbl_client set client_status = 0 where client_id = $id");
        return $result;
    }
    public function unban($id)
    {
        $result = DB::update("update tbl_client set client_status = 1 where client_id = $id");
        return $result;
    }
}
