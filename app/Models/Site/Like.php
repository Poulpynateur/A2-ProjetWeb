<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use DB;

class Like extends Model
{
    protected $table = 'likes';
    public $timestamps = false;

    protected $fillable = [
        'id_Users', 'id_Pictures'
    ];

    /**
     * Check if user have like a given picture
     * @return boolean
     */
    public static function haveUserLike($pictureID) {
        return Like::where('id_Users', Auth::id())->get()->contains('id_Pictures', $pictureID);
    }
}
