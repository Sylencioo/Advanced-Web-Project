<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'grant_id', 'description', 'deadline', 'status'
    ];

    public function grant()
    {
        return $this->belongsTo(Grant::class);
    }
}