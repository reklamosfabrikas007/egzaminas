<?php

namespace App\Http\Controllers;

use App\ItemComments;
use Illuminate\Http\Request;
use App\shopitem;

class ItemCommentsController extends Controller
{
    //
    public function createcomment(shopitem $item)
    {

        $this->validate(request(), [
            'body' => 'required'
        ]);
        ItemComments::create([
            'body' => request('body'),
            'shopitem_id' => $item->id
        ]);
        return back();


    }
}
