<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\threadpost;

class ThreadpostController extends Controller
{
    //
    public function makethread(Request $request)
    {
        $this->validate(request(),[
            'reply' => 'required'
        ]);

        $body = $request->input('body');
        $file = $request->file('image');

        threadpost::create([
            'body'=>$body
        ]);
        return redirect('/forum');

    }
}
