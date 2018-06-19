<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    //
    protected $fillable = ['post_id','body','user_id'];
   public function comments(){
       return $this->belongsTo(Post::class);
   }
    public function user(){
        return $this->belongsTo(User::class);
    }


}

