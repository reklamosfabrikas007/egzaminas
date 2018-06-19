<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\shopitem;

class CategoryController extends Controller
{
    //
    public function showItemsInCat(Category $catid){
        $shopitems = shopitem::where('category_id',$catid->id)->paginate(8);
        return view('pages.category',compact('shopitems'));
    }



}
