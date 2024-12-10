<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ListController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TrendPostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('dashboard', [ProfileController::class, 'index'])->name('admin#dashboard');

        // Admin
        Route::get('profile', [ProfileController::class, 'index'])->name('admin#profile');
        Route::post('profile', [ProfileController::class, 'update'])->name('admin#profile#update');
        Route::get('changePassword', [ProfileController::class, 'changePasswordPage'])->name('admin#profile#changePasswordPage');
        Route::post('changePassword', [ProfileController::class, 'changePassword'])->name('admin#profile#changePassword');

        // Admin List
        Route::get('list', [ListController::class, 'index'])->name('admin#list');
        Route::get('delete/{id}', [ListController::class, 'delete'])->name('admin#delete');

        // Category
        Route::get('category', [CategoryController::class, 'index'])->name('admin#category');
        Route::post('category/create', [CategoryController::class, 'create'])->name('admin#category#create');
        Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('admin#category#delete');
        Route::get('category/update/{id}', [CategoryController::class, 'updatePage'])->name('admin#category#updatePage');
        Route::post('category/update', [CategoryController::class, 'update'])->name('admin#category#update');

        // Post
        Route::get('post', [PostController::class, 'index'])->name('admin#post#list');
        Route::post('post', [PostController::class, 'create'])->name('admin#post#create');
        Route::post('post/delete', [PostController::class, 'delete'])->name('admin#post#delete');
        Route::get('post/edit/{id}', [PostController::class, 'editPage'])->name('admin#post#editPage');
        Route::post('post/edit', [PostController::class, 'edit'])->name('admin#post#edit');


        // Trend Post
        Route::get('trendpost', [TrendPostController::class, 'index'])->name('admin#trendpost');
    });
});
