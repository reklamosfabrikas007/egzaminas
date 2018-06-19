<?php

namespace App\Http\Controllers;

use App\ItemComments;
use Illuminate\Http\Request;

class ItemCommentsController extends Controller
{
    //
    public function createcomment(ItemComments $itemCom){

        $this->validate(request(),[
            'body' => 'required'
        ]);
        ItemComments::create([
            'body'=>request('body'),
            'shopitem_id'=>$itemCom->id
        ]);
        return back();
    }
}
