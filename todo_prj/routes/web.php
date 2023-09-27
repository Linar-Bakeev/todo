<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\TasksController@indx');
Route::get('/tasks', 'App\Http\Controllers\TasksController@indx');

Route::get('/tasks/create', 'App\Http\Controllers\TasksController@create');

Route::post('/tasks', 'App\Http\Controllers\TasksController@store');

Route::patch('/tasks/{id}', 'App\Http\Controllers\TasksController@update');

Route::delete('/tasks/{id}', 'App\Http\Controllers\TasksController@delete');



Route::name('user.')->group(function (){

    Route::view('/tasks', '/tasks/index')->middleware('auth')->name('private');

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect()->route('user.private');
        }
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function (){
        Auth::logout();
        return redirect('/tasks');
    })->name('logout');

    Route::get('/reg', function (){
        if (Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/reg',[\App\Http\Controllers\RegisterController::class, 'save']);
});
