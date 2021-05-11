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

Auth::routes();

Route::get('/','Vendor\WelcomeController@index');
Route::get('/home/blog','Vendor\WelcomeController@blog')->name('blogs');
Route::post('/home/search','Vendor\WelcomeController@blogsearch')->name('blogsearch');
Route::get('/home/blog/singleblog/{slug}','Vendor\WelcomeController@singleblog')->name('singleblog');
Route::get('/home/blog/category/{id}','Vendor\WelcomeController@blogCategory')->name('blogCategory');


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('blog','Vendor\BlogController');

Route::post('comment/store','Vendor\CommentController@store')->name('comment');
Route::resource('category','Vendor\CategoryController');
Route::resource('testimonial','Vendor\TestimonialController');
Route::post('contact','Vendor\ContactController@store')->name('contact');
Route::post('contact/stores','Vendor\ContactController@contactstore')->name('contactstore');
Route::resource('faq','Vendor\FaqController');
Route::resource('service','Vendor\ServiceController');
Route::resource('price','Vendor\PriceController');
Route::resource('value','Vendor\OurValueController');
Route::resource('about','Vendor\AboutusController');
Route::resource('team','Vendor\TeamController');