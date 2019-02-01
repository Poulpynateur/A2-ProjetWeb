<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    public static $APItoken;

    protected $connection = 'users_data';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname' ,'firstname', 'email', 'password','id_campus', 'id_role', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'token'
    ];

    public function campus() {
        return $this->hasOne('App\Models\Campus', 'id', 'id_campus');
    }

    public function role() {
        return $this->hasOne('App\Models\Role', 'id', 'id_role');
    }

    public function voteFor() {
        return $this->belongsToMany('App\Models\Site\Event','site_data.votes' ,'id_Users', 'id_Events');
    }

    /**
     * Check if the authentificated user have vote for a given event
     * @return bool
     */
    public static function haveVoteFor($eventID) {
        return User::find(Auth::id())->voteFor->find($eventID);
    }
}
