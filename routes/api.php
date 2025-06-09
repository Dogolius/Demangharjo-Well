<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//test
//Route::get('/show', [PostController::class, 'all']);
//authentication routes
Route::post('/login', [LoginController::class, 'authenticateMobile']);
Route::post('/register', [RegisterController::class, 'storeMobile']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/show', [PostController::class, 'all']);
});