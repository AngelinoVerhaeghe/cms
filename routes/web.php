<?php

use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('index');
}); */

Auth::routes();

Route::middleware(['auth'])->group( function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::resource('categories', '\App\Http\Controllers\CategoriesController');
    Route::resource('posts', '\App\Http\Controllers\PostsController');

    //? Routes with softDeletes
    Route::get('trashed-posts', [\App\Http\Controllers\PostsController::class, 'trashed'])->name('trashed-posts.index');

    //? Restore Routes
    Route::put('restore-post/{post}', [\App\Http\Controllers\PostsController::class, 'restore'])->name('restore-post');
});
