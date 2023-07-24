<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardReportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('/about', function () {
    return view("about", [
        "title" => "About", 
        "name" => "Julius Adrian",
        "email" => "juliusa368@gmail.com",
        "image" => "img/julius_adrian.jpg"
    ]);
});



Route::get('/blog', [PostController::class, 'index']);

Route::get('post/{postingan:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/room', [ReportController::class, 'create']);
Route::post('/room', [ReportController::class, 'store']);

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/reports', [DashboardReportController::class, 'index'])->middleware('auth');
Route::get('/dashboard/reports/{report:id}', [DashboardReportController::class, 'show'])->middleware('auth');
Route::delete('/dashboard/reports/{report:id}', [DashboardReportController::class, 'destroy'])->middleware('auth');
