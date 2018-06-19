<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class shopitem extends Model
{
    public $fillable = ['title', 'description','image', 'user_id','price','item_id','warehouse_id','quantity','category_id'];
    //
    public function shopitem(){
        return $this->belongsTo(Warehouse::class);
    }
    public function shopitemcat(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ItemComments(){
        return $this->hasMany(ItemComments::class);
    }
}
