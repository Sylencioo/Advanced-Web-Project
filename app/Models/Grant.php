<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'provider', 'amount', 'start_date', 'duration', 'leader_id'
    ];
    public function leader()
{
    return $this->belongsTo(User::class, 'leader_id');
}

public function members()
{
    return $this->belongsToMany(User::class, 'grant_user', 'grant_id', 'user_id');
}

}
