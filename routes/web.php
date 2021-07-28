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

//? Public Routes
Route::get('/', [\App\Http\Controllers\PagesController::class, 'index'])->name('index');

Auth::routes();

Route::middleware(['auth'])->group( function () {
    Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');

    Route::resource('admin/categories', '\App\Http\Controllers\CategoriesController');
    Route::resource('admin/tags', '\App\Http\Controllers\TagsController');
    Route::resource('admin/posts', '\App\Http\Controllers\PostsController');

    //? Routes with softDeletes
    Route::get('trashed-posts', [\App\Http\Controllers\PostsController::class, 'trashed'])->name('trashed-posts.index');

    //? Restore Routes
    Route::put('restore-post/{post}', [\App\Http\Controllers\PostsController::class, 'restore'])->name('restore-post');
});

//? Administrators routes only
Route::middleware(['auth', 'admin'])->group( function () {
    Route::get('users/profile', [\App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit-profile');
    Route::put('users/profile', [\App\Http\Controllers\UsersController::class, 'update'])->name('users.update-profile');
    Route::get('users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::post('users/{user}/make-admin', [\App\Http\Controllers\UsersController::class, 'makeAdmin'])->name('users.make-admin');
});

