<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostResource extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'path_resource'
    ];
}
