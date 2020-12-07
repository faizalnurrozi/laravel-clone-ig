<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $fillable = ['id', 'user_id', 'caption', 'state'];
    protected $dates = ['created_at', 'updated_at'];

    public function postDetail(){
        return $this->hasMany('App\Models\PostDetail');
    }
    
}
