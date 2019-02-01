<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $connection = 'site_data';
    protected $table = 'comments';
    public $timestamps = false;

    protected $fillable = [
        'content' , 'date', 'id_Users', 'id_Pictures'
    ];

    public function author() {
        return $this->hasOne('App\Models\User', 'id', 'id_Users');
    }
    public function picture() {
        return $this->hasOne('App\Models\Site\Picture', 'id', 'id_Pictures');
    }

    /**
     * Get all comments for a given picture ID
     * @return Collection
     */
    public static function getPictureComments($id_Pictures) {
        return Comment::where('id_Pictures', $id_Pictures)->get();
    }

    /**
     * Check if user have already comment
     * @return bool
     */
    public static function haveUserComment($id_Pictures) {
        return Comment::where('id_Pictures', $id_Pictures)->where('id_Users', Auth::id())->get()->isEmpty();
    }
}
