<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as GuestPostController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'show']);

Route::name('posts.index')->get('posts', [GuestPostController::class, 'index']);
Route::name('posts.show')->get('posts/{post}', [GuestPostController::class, 'show']);

Route::as('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('authors', AuthorController::class);
});
