<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Post;
class CommentsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createcomment(Post $post){

        $this->validate(request(),[
            'body' => 'required'
        ]);
        Comments::create([
            'body'=>request('body'),
            'post_id'=>$post->id,
            'user_id'=>auth()->id()
        ]);
        return back();
    }
    public function deleteComment(Comments $comments){
        $comments->delete();
        return back();
    }
}
