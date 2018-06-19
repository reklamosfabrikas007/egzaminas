<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/','PublicPostController@viewContent');
Route::get('/','PublicPostController@showitems');
Route::get('/about', 'PublicPostController@viewabout');


Route::get('/newpost','PostController@newpost');

Route::post('/savepost','PostController@store');

Route::get('/viewfullpost', function(){
    return view('pages.viewfullpost');
});

Route::get('/viewfullpost/{post}','PublicPostController@viewfullcontent');
Route::post('/uploadimage','PostController@postimage');
//Route::post('/createtext','Postcontroller@textcreate');
Route::get('/post/{post}/edit-post', 'PostController@postEdit');
Route::patch('/post/{post}', 'PostController@postUpdateStore');
//TRINIMAS----------------------------POST---------------------
Route::get('/post/{post}/delete-post', 'PostController@deletePost');
//----AUTH---------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','PostController@loadadmin');
Route::post('/viewfullpost/{post}/comment','CommentsController@createcomment');
Route::get('/viewfullpost/{comment}/delete-post', 'CommentsController@deleteComment');

Route::get('images/{image}', function($image = null)
{
    $path = storage_path().'/app/public/images/' . $image;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

//--------------------Eshop
Route::get('/eshop','PublicPostController@showitems');
Route::get('/shopmag','ShopitemController@shopManageOpen');
Route::post('/saveitem','ShopitemController@saveitem');
Route::get('/viewfullitem/{item}', 'PublicPostController@viewfullitem');
//-------------------Add item to cart
Route::get('/add-to-cart/{id}',
    [
        'uses' => 'ShopItemController@getAddtoCart',
        'as' => 'shopitem.addToCart'
    ]
    );
//-------------------Item edit
Route::get('/shopitem/{item}/edit-item', 'ShopitemController@itemEdit');
Route::patch('/shopitem/{item}', 'ShopitemController@postUpdateStore');
Route::get('/shopitem/{item}/delete-item', 'ShopitemController@deleteitem');
//------------------Warehouse
Route::post('/savewarehouse','WarehouseController@saveWarehouse');
Route::get('/shopmag','WarehouseController@viewWarehouses');
//------------------Categories
Route::post('/savecategory','ShopitemController@savecat');
Route::get('/category/{catid}','CategoryController@showItemsInCat');
//------------------Item comments

//---shop admin
Route::get('/shopadmin','ShopitemController@admin');
//-------------------------------------------------------
Route::get('/slider', 'PublicPostController@slider'); //neveikia
Route::get('/forum', 'PublicPostController@forum');
Route::post('/makethread', 'ThreadpostController@makethread');

//----------------------------
Route::post('/viewfullitem/{itemCom}/comment','ItemCommentsController@createcomment');