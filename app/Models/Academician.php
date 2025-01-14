<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'staff_number', 'email', 'college', 'department', 'position',
    ];
    

    public function ledgrants(){
        return $this->hasMany(Grant::Class, 'leader_id');
    }

    public function memberGrants()
    {
        return $this->belongsToMany(Grant::class, 'grant_academician', 'academician_id', 'grant_id');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

}

