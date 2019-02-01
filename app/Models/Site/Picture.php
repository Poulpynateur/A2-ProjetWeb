<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';
    public $timestamps = false;

    protected $fillable = [
        'link', 'id_Events' , 'id_Users'
    ];

    public function postedBy(){
        return $this->hasOne('App\Models\User', 'id', 'id_Users');
    }

    public function event(){
        return $this->hasOne('App\Models\Site\Event', 'id','id_Events');
    }

    /**
     * All pictures for one event
     * @return Collection
     */
    public static function getEventPictures($eventID) {
        return Picture::where('id_Events', $eventID)->where('link','NOT LIKE', '%reported')->get();
    }
}
