<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $connection = 'site_data';
    protected $table = 'events';
    public $timestamps = false;

    protected $fillable = [
        'name' , 'date', 'description', 'image','price_participation', 'id_Campuses','id_Repetitions', 'id_Users', 'id_Approbations'
    ];

    public function author() {
        return $this->hasOne('App\Models\User','id', 'id_Users');
    }
    public function campus() {
        return $this->hasOne('App\Models\Campus','id', 'id_Campuses');
    }
    public function repetition() {
        return $this->hasOne('App\Models\Site\Repetition','id', 'id_Repetitions');
    }

    public function votedBy() {
        return $this->belongsToMany('App\Models\User','site_data.votes' ,'id_Events', 'id_Users');
    }
    
    /**
     * Return events sorted by votes
     * @return int
     */
    public static function mostVotesSuggestion() {
        return Event::with('votedBy')->where('id_Approbations', 1)->get()->sortByDesc(function($event)
        {
            return $event->votedBy->count();
        });
    }
}
