<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
            'image'=>'required'
        ]);
            $title = $request->input('title');
            $body = $request->input('body');
            $file = $request->file('image');
            $userid = $request->input('user_id');
            $filename = $request->file('image')->getClientOriginalName();
            $filelink = 'assets/images/'.$filename;
            $filelink2 = '/'.$filename;
            Image::make(Input::file('image'))->resize(200, 200)->save('iimages/'.$filename);
            Storage::disk('public')->put($filelink2, File::get($file));
        //Post::create(request()->all());
        Post::create([
            'image'=>$filename,'title'=>$title,'body'=>$body,'user_id'=>auth()->id()
        ]);
        return redirect('/');

    }


    public function postimage(Request $request) {
        $file= $request->file('image');
        $filename = $request->file('image')->getClientOriginalName();
        Storage::disk('public')->put($filename, File::get($file));
        //echo '<img src="'.$contents.'"/>';
        return redirect('/');
    }

    public function postEdit(Post $post){
        if(Gate::denies('edit-post',$post)){
            return view('pages.restrict');
        }

        return view('pages.edit-post',compact('post'));
    }


    public function postUpdateStore(Request $request, Post $post){
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
        ]);
        //$filename = $request->file('image')->getClientOriginalName();
        //$file = $request->file('image');
        //$title = $request->input('title');
        //$body = $request->input('body');
        //$filelink = 'assets/images/'.$filename;
        //Storage::disk('public')->put($filelink, File::get($file));
        Post::where('id',$post->id)->update($request->only(['title','body']));
        return redirect('/');
    }
    public function deletePost(Post $post){
        if(Auth::id()==1){
            $post->delete();
            return redirect('/admin');
        }
        else if(Gate::denies('delete-post',$post)){
            return view('pages.restrict');
        }
        $post->delete();
        return redirect('/');
    }
    public function newpost(){
        return view('pages.newpost');
    }
    public function loadadmin(){
        $post = Post::all();
        return view('pages.admin',compact('post'));
    }


}
