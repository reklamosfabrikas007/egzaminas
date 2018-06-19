<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body','image', 'user_id'];
    public function comments(){
        return $this->hasMany(Comments::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}


