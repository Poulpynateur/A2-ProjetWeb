<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $connection = 'site_data';
    protected $table = 'categories';

    public function categorie() {
        return $this->hasOne('App\Models\Site\Categories', 'id', 'id_Categories');
    }

    public function campus() {
        return $this->hasOne('App\Models\Campuses', 'id', 'id_Campuses');
    }
}
