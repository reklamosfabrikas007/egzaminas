<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    protected $fillable = ['title','user_id','location'];
    public function shopitems(){
        return $this->hasMany(shopitem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
