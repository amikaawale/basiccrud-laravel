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

    Route::get('/todos','TodoController@index')->name('todo.index');

    Route::get('/todos/create','TodoController@create')->name('todo.create');

    Route::get('/todos/{todo}/edit','TodoController@edit')->name('todo.edit');

    Route::post('/todos/create','TodoController@store')->name('todo.store');

    Route::patch('/todos/{todo}/update','TodoController@update')->name('todo.update');

    Route::put('/todos/{todo}/complete','TodoController@complete')->name('todo.complete');

    Route::put('/todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');

    Route::delete('/todos/{todo}/delete','TodoController@delete')->name('todo.delete');

    Route::get('/todos/{todo}/show','TodoController@show')->name('todo.show');


});








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
