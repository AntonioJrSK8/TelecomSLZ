<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    public function user() 
    {
        return $this->morphOne(User::class, 'userable');
    }
}
