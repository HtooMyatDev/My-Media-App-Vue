<?php

use App\Http\Controllers\ActionLogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('user/login', [AuthController::class, 'login']);

Route::post('user/register', [AuthController::class, 'register']);

Route::get('category', [AuthController::class, 'categoryList'])->middleware('auth:sanctum');

Route::get('allPost', [PostController::class, 'allPost']);
Route::post('search/post', [PostController::class, 'searchPost']);
Route::post('post/details', [PostController::class, 'postDetails']);

Route::get('allCategory', [CategoryController::class, 'allCategory']);
Route::post('search/category', [CategoryController::class, 'searchCategory']);

Route::post('view/count', [ActionLogController::class, 'add']);
