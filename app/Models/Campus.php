<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $connection = 'site_data';
    protected $table = 'campuses';
}
