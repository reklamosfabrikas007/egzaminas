<?php

namespace App\Http\Controllers;

use App\shopitem;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PublicPostController extends Controller
{
    //
    public function viewcontent()
    {
        //$post = Post::paginate(8);
        $post = DB::table('posts')->orderBy('created_at', 'desc')->paginate(4);
        //$post = Post::all();
        //$post= DB::table('posts')
        //$post = DB::table('posts')->select('title','image', 'body','created_at','updated_at', 'id')->latest()->get();
        return view('pages.home',compact('post'));
    }
    public function viewfullcontent(Post $post)
    {
        return view('pages.viewfullpost',compact('post'));
    }
    public function viewabout(){
        return view('pages.about');
    }
    public function showitems(){
        $categoryshow = Category::all();
        $item = shopitem::paginate(10);
        return view('pages.eshop',compact('item','categoryshow'));
    }
    public function viewfullitem(shopitem $item)
    {
        return view('pages.viewfullitem',compact('item'));
    }
    //-----------Neveikia
    public function slider(){
        $directory = "/iimages/";
        $images = glob($directory . "*.png");
        return view('pages.slider',compact('images'));
    }
    //--------------------------
    public function forum(){
        return view('pages.forum');
    }



}
