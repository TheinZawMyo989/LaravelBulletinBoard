<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['id','title','content','image','created_at','updated_at','user_id'];
}
