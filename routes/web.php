<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


Route::middleware('auth')->group(function (){

    Route::resource('test','TestController');

});



require_once app_path()."/Modules/Todo/route.php";




Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/upload',function(Request $request){

//     if($request->hasFile('image')){
//         // dd($request->all());
//         $request->image->store('images','public');
//         return 'Uploaded';
//     }
   
//     });

Route::post('/upload', 'UserController@uploadAvatar');
