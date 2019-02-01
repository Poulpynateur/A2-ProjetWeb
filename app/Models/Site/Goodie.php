<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Goodie extends Model
{
    protected $table = 'goodies';
    public $timestamps = false;

    protected $fillable = [
        'name' , 'price', 'stock', 'description', 'image','id_Categories', 'id_Campuses'
    ];

    public function category() {
        return $this->hasOne('App\Models\Site\Categorie', 'id', 'id_Categories');
    }
    public function campus() {
        return $this->hasOne('App\Models\Campus', 'id', 'id_Campuses');
    }
}
