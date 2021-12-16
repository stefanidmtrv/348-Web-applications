<?php

use App\Http\Controllers\CommentController;
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

Route::get('posts/comments',
[CommentController::class, 'apiIndex'])->name('api.comments.index');
Route::post('posts/comments',
[CommentController::class, 'apiStore'])->name('api.comments.store');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
