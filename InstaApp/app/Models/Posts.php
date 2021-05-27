<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'Posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'deskripsi',
        'foto'
    ];
    public function getFoto(){
        if($this->foto != null){
            return asset('dist/posts/'.$this->foto);
        }else{
            return asset('/dist/img/default-150x150.png');
        }
    }
}
