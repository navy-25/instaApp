<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'Likes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_posts',
        'status'
    ];

}
