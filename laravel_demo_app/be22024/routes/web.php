<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ HomeController::class, 'index' ])->name('home');
Route::get('admin', [ HomeController::class, 'indexAdmin' ])->name('home.admin');

Route::get('products', [ ProductController::class, 'indexUser' ]);
Route::get('products/{id}', [ ProductController::class, 'showUser' ])->name('products.showUser');

Route::resource('categories', CategoryController::class);
Route::resource('comments', CommentController::class);

// Gom nhóm các route bắt đầu bằng /admin
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});
