<?php

namespace App\Http\Controllers;

use App\Category;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class WarehouseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function saveWarehouse(Request $request){
        $this->validate(request(),[
            'title' => 'required',
            'location' => 'required'
        ]);
        $title = $request->input('title');
        $location = $request->input('location');
        Warehouse::create([
            'title'=>$title,'location'=>$location,'user_id'=>auth()->id()
        ]);
        return redirect('/shopmag');
    }
    public function viewWarehouses()
    {
        $category = Category::all();
        $warehouse = Warehouse::all();
        return view('pages.shopmag',compact('warehouse','category'));
    }
}
