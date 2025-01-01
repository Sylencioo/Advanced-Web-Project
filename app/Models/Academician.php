<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    public function grants(){
        return $this->hasMany(Grant::Class, 'leader_id');
    }
}
