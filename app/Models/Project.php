<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function grant()
{
    return $this->belongsTo(Grant::class);
}

public function milestones()
{
    return $this->hasMany(Milestone::class);
}
}
