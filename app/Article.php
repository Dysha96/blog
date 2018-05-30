<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'id', 'user_id', 'content', 'title', 'created_articles'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
