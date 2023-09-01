<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardReportController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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




// Route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Route tentang demangharjo
Route::get('/about/history', [AboutController::class, 'history']);
Route::get('/about/structure', [AboutController::class, 'structure']);
Route::get('/about/vision', [AboutController::class, 'vision']);
Route::get('/about/apbd', [AboutController::class, 'apbd']);
Route::get('/about/destination', [AboutController::class, 'destination']);

// Route seputar demangharjo
Route::get('/blog', [PostController::class, 'index']);

// Route postingan
Route::get('post/{postingan:slug}', [PostController::class, 'show']);

// Route kategori
Route::get('/categories', [CategoryController::class, 'index']);

// Route bilik aduan
Route::get('/room', [ReportController::class, 'create']);
Route::post('/room', [ReportController::class, 'store']);

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/documents', DocumentController::class)->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/reports', [DashboardReportController::class, 'index'])->middleware('auth');
Route::get('/dashboard/reports/{report:id}', [DashboardReportController::class, 'show'])->middleware('auth');
Route::delete('/dashboard/reports/{report:id}', [DashboardReportController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard/password', [UserController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/password', [UserController::class, 'update'])->middleware('auth');


