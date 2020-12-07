<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDetail extends Model
{
    use HasFactory;

    protected $table = 'post_detail';
    protected $fillable = ['id', 'post_id', 'image'];
    protected $dates = ['created_at', 'updated_at'];

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }
}
