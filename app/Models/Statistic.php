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
}
