<?php

use App\Http\Controllers\Api\Admin\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::as('api.admin.')->prefix('admin')->middleware('auth:api')->group(function () {
    Route::apiResource('posts', PostController::class)->except(['show']);
    Route::post('posts/{post}/toggle-featured', [PostController::class, 'toggleFeatured'])->name('post.toggle-featured');
    Route::post('posts/{post}/toggle-published', [PostController::class, 'togglePublished'])->name('post.toggle-published');
});
