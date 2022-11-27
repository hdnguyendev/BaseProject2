<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'tbl_comment';
    public $timestamps = false;

    public function getDataRatingAverage($id)
    {
        $result = DB::table('tbl_comment', 'a')->select(DB::raw(" movie_name, IFNULL(AVG(comment_rating),'0') as rating_avg, IFNULL(COUNT(comment_rating),'0') as total_rating,
        (SELECT IFNULL(COUNT(comment_rating),'0')  FROM tbl_comment as b WHERE comment_rating = 1 and b.movie_name = a.movie_name GROUP BY movie_name) as rating_1,
        (SELECT IFNULL(COUNT(comment_rating),'0') FROM tbl_comment as b WHERE comment_rating = 2 and b.movie_name = a.movie_name GROUP BY movie_name) as rating_2,
        (SELECT IFNULL(COUNT(comment_rating),'0') FROM tbl_comment as b WHERE comment_rating = 3 and b.movie_name = a.movie_name GROUP BY movie_name) as rating_3,
        (SELECT IFNULL(COUNT(comment_rating),'0') FROM tbl_comment as b WHERE comment_rating = 4 and b.movie_name = a.movie_name GROUP BY movie_name) as rating_4,
         (SELECT IFNULL(COUNT(comment_rating),'0') FROM tbl_comment as b WHERE comment_rating = 5 and b.movie_name = a.movie_name GROUP BY movie_name) as rating_5
          "))->where('comment_status',1)->where('movie_name', $id)->groupBy('movie_name')->get()->first();
        return $result;
    }
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
    public function getAll()
    {

        // $result = DB::select("SELECT c.*, u.* from tbl_comment c, tbl_client u where u.client_id = c.client_id AND c.comment_status = 1 ORDER BY comment_id DESC");

        $result = DB::table('tbl_comment')->join('tbl_client','tbl_comment.client_id','=','tbl_client.client_id')->orderByDesc('tbl_comment.comment_id')->paginate(10);
        return $result;
    }
    public function updateStatus($id){
        $result = DB::update('UPDATE tbl_comment set comment_status = !comment_status where comment_id = ?', $id);
        return $result;
    }
}
