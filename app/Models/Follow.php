<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_followed_id'
    ];

    public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
