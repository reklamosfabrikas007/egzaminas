<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ItemComments extends Model
{
    //
    protected $fillable = ['shopitem_id','body'];
    public function Itemcomments(){
        return $this->belongsTo(shopitem::class);
    }

}
