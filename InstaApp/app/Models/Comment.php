<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'Comment';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_posts',
        'comment'
    ];
}
