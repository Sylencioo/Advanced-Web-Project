<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    public function project()
{
    return $this->belongsTo(Project::class);
}
}
