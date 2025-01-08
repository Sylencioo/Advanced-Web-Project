<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'provider', 'amount', 'start_date', 'duration', 'leader_id',
    ];
    public function leader()
    {
        return $this->belongsTo(Academician::class, 'leader_id');
    }
    
    public function members()
    {
        return $this->belongsToMany(Academician::class, 'grant_academician', 'grant_id', 'academician_id')
                    ->wherePivot('role', 'member');
    }
    
    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
}
