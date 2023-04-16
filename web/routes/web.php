<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', function() {
    return redirect()->route('home');
});
Route::get('gallery/{cat}', 'GalleryController@gallery_by_cat')->name('gallery');

Route::get('blogs', 'BlogsController@index')->name('blogs.list');
Route::get('blogs/{title}', 'BlogsController@show')->name('blogs.show');
Route::get('next', 'HomeController@next')->name('next');
Route::post('order', 'OrdersController@save_order');

Route::get('services/{type}', 'ServicesController@index')->name('services');


// --------- For Control area (admin) ----------
Route::group(['middleware'=>['auth', 'role:1'], 'prefix' => 'control'], function() {
    Route::get('/', function() {
        return redirect()->route('ctrBlogList');
    });
    Route::get('orders', 'OrdersController@ctr_list_orders')->name('ctrOrderList');
    Route::post('update_order', 'OrdersController@update_order');    
    Route::get('filter_orders', 'OrdersController@ctr_filter_orders')->name('ctrOrderFilter');

    Route::get('blogs', 'BlogsController@ctr_list_blogs')->name('ctrBlogList');
    Route::post('update_blog', 'BlogsController@update_blog');    
    Route::get('filter_blogs', 'BlogsController@ctr_filter_blogs')->name('ctrBlogFilter');

    Route::get('users', 'UsersController@ctr_list_users')->name('ctrUserList');
    Route::post('update_user', 'UsersController@update_user');
});


Auth::routes();
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');