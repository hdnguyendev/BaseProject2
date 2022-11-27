<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteMovies extends Model
{
    use HasFactory;
    protected $table = 'tbl_favorite_movies';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public static function  getListFavorite($id)
    {
        $result = FavoriteMovies::where('client_id', $id)->get(['movie_name']);
        return $result;
    }
}
