<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\View;

// Route::get('/todos', 'App\Http\Controllers\TodoController@index')->name('todo.index');
// Route::get('/todos/create', 'App\Http\Controllers\TodoController@create');
// Route::post('/todos/create', 'App\Http\Controllers\TodoController@store');
// Route::get('/todos/{todo}/edit', 'App\Http\Controllers\TodoController@edit');
// Route::patch('/todos/{todo}/update', 'App\Http\Controllers\TodoController@update')->name('todo.update');
// Route::delete('/todos/{todo}/delete', 'App\Http\Controllers\TodoController@delete')->name('todo.delete');

// Route::middleware('auth')->group(function() {
    Route::resource('/todo', 'App\Http\Controllers\TodoController');
    
    Route::put('/todos/{todo}/complete', 'App\Http\Controllers\TodoController@complete')->name('todo.complete');
    Route::delete('/todos/{todo}/incomplete', 'App\Http\Controllers\TodoController@incomplete')->name('todo.incomplete');

// });


Route::get('/', function () {
    return view('welcome');
});
Route::post('/upload', 'App\Http\Controllers\UserController@uploadAvatar');
Route::get('/user', 'App\Http\Controllers\UserController@index');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
