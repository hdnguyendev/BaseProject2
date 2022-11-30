<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Statistic extends Model
{
    use HasFactory;
    public function updateViews($data)
    {
        $result = DB::select('SELECT * from tbl_statistic_view where movie_name = ? and view_date = ?', $data);
        if ($result){
            $result = DB::update('UPDATE tbl_statistic_view set total_views = total_views + 1 where movie_name = ? and view_date = ?', $data);
            return $result;
        } else {
            $result = DB::insert('INSERT into tbl_statistic_view (movie_name, view_date) values (?, ?)',$data);
            return $result;
        }
    }
    public function getTotalViews()
    {
        $result = DB::select('SELECT SUM(`total_views`) as all_views FROM tbl_statistic_view');
        return $result[0]->all_views;
    }
    public function getDataViews()
    {
        $result = DB::select('SELECT view_date, SUM(total_views) as total_views FROM `tbl_statistic_view` GROUP BY view_date;');
        return $result;
    }
    public function getDataClients()

    {
    }
    public function getTotalComments()
    {
        $result = DB::select('SELECT COUNT(comment_id) as total_comments FROM `tbl_comment`');
        return $result[0]->total_comments;
    }
    public function getTotalClients()
    {
        $result = DB::select('SELECT COUNT(client_id) as total_clients FROM `tbl_client`');
        return $result[0]->total_clients;
    }

}
