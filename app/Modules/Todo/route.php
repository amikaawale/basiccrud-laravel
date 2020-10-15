<?php


use Illuminate\Support\Facades\Route;

Route::namespace('\App\Modules\Todo\Controllers')->group(function (){

    // Route::middleware('auth')->group(function (){


        Route::get('/todos','TodoController@index')->name('todo.index');

        Route::get('/todos/create','TodoController@create')->name('todo.create');

        Route::get('/todos/{todo}/edit','TodoController@edit')->name('todo.edit');

        Route::post('/todos/create','TodoController@store')->name('todo.store');

        Route::patch('/todos/{todo}/update','TodoController@update')->name('todo.update');

        Route::put('/todos/{todo}/complete','TodoController@complete')->name('todo.complete');

        Route::put('/todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');

        Route::delete('/todos/{todo}/delete','TodoController@delete')->name('todo.delete');

        Route::get('/todos/{todo}/show','TodoController@show')->name('todo.show');


    // });

});


