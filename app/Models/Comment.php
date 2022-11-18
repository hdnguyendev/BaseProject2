<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;
    public function getCommentsbyMovieId($id)
    {
        $result = DB::select("SELECT c.*, u.client_name, u.client_avatar from tbl_comment c, tbl_client u where c.movie_name ='" . $id . "' AND u.client_id = c.client_id AND c.comment_status = 1 ORDER BY comment_id DESC");
        return $result;
    }
    public function addComment($data)
    {
        $result = DB::insert('INSERT into tbl_comment (movie_name, comment_content,comment_rating, client_id) values (?, ?, ?, ?)', $data);
        if ($result) {
            $a = $this->getCommentsbyMovieId($data[0])[0];
            return $a;
        }
    }
}
