<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




// Route::group(['middleware' => CheckRoleMiddleware::class],function(){

//     Route::get('/posts',[PostController::class,'index'])->name('posts.index');
//     Route::post('/posts',[PostController::class,'store'])->name('posts.store');

// });

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
