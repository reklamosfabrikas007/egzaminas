<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Shopitem;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\cart;
use Session;

class ShopitemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shopManageOpen()
    {
        return view('pages.shopmag');

    }

    public function saveitem(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'warehouse_id' => 'required',
            'category_id'=>'required'
        ]);
        $itemid = $request->input('item_id');
        $price = $request->input('price');
        $categoryid = $request->input('category_id');
        $title = $request->input('title');
        $body = $request->input('description');
        $file = $request->file('image');
        $warehouseid = $request->input('warehouse_id');
        $quantity = $request->input('quantity');
        //$userid = $request->input('user_id');
        $filename = $request->file('image')->getClientOriginalName();
        //$filelink = 'assets/images/'.$filename;
        $filelink2 = '/' . $filename;
        Storage::disk('public')->put($filelink2, File::get($file));
        //Post::create(request()->all());
        Shopitem::create([
            'image' => $filename, 'title' => $title, 'description' => $body, 'item_id' => $itemid, 'price' => $price,
            'warehouse_id' => $warehouseid,
            'quantity' => $quantity,
            'category_id' => $categoryid,
            'user_id' => auth()->id()
        ]);
        return redirect('/eshop');
    }

    public function itemEdit(shopitem $item)
    {
        //if (Gate::denies('edit-item', $item)) {
            //return view('pages.restrict');
        //}
        return view('pages.edit-item', compact('item'));
    }

    public function deleteitem(shopitem $item)
    {
        /*if(Auth::id()==1){
            $item->delete();
            return redirect('/shopadmin');
        }*/
        if (Gate::denies('delete-item', $item)) {
            return view('pages.restrict');
        }
        $item->delete();
        return redirect('/eshop');
    }

    public function postUpdateStore(Request $request, shopitem $item)
    {
        //--Padaryt reik dar gate:;denies suda
        //$this->validate(request(), [
            //'title' => 'required',
            //'body' => 'required',
            //'price' => 'required',
            //'quantity' => 'required'
        //]);
        shopitem::where('id', $item->id)->update($request->only(['title', 'body', 'price', 'quantity']));
        return redirect('/eshop');
    }
    public function savecat(Request $request){
        $this->validate(request(), [
            'title' => 'required']);
        $title = $request->input('title');
        Category::create(['title' => $title]);
        return redirect('/shopmag');
    }
    public function admin(){
        //$item = shopitem::where('user_id',Auth::id())->all();
        $item = DB::table('shopitems')->where('user_id',Auth::id())->get();
        return view('pages.shopadmin',compact('item'));
    }

    public function getAddtoCart (Request $request, $id){
        $product = shopitem::find($id);
        var_dump($product);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->$id);
        $request->session()->put('cart', $cart);
        dd($request->session()->get('cart'));
        //return redirect('/eshop');

    }





























}