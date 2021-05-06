<?php

use Illuminate\Support\Facades\Route;
use App\Blog;
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

// Route::get('/', function () {
//     // $recentblogs = Blog::orderby('id','desc')->take(3)->get();
//     return view('vendor.welcome');
// });


Route::get('/','Vendor\WelcomeController@index');
Route::get('/home/blog','Vendor\WelcomeController@blog')->name('blogs');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('blog','Vendor\BlogController');
Route::resource('category','Vendor\CategoryController');
