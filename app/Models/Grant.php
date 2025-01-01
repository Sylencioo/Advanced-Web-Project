<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    public function leader()
{
    return $this->belongsTo(User::class, 'leader_id');
}

public function projects()
{
    return $this->hasMany(Project::class);
}
}
