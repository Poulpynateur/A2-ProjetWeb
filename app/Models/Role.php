<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'users_data';
    protected $table = 'roles';
}
