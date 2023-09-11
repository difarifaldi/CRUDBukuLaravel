<?php

use App\Http\Controllers\AllController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Models\Role;
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
    return view('layouts.home', [
        "title" => "home"
    ]);
});

Route::get('/loginAdmin', [LoginController::class, 'admin'])->name('loginAdmin')->middleware('guest');
Route::post('/loginAdmin', [LoginController::class, 'authenticate']);

Route::get('/loginUser', [LoginController::class, 'user'])->name('loginUser')->middleware('guest');
Route::post('/loginUser', [LoginController::class, 'authenticate2']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/allPost', [AllController::class, 'index'])->middleware('auth');
Route::get('/allRole', [AllController::class, 'allRole'])->middleware('auth');
Route::get('/allProfile', [AllController::class, 'allProfile'])->middleware('auth');
Route::get('/allPost/{post:slug}', [AllController::class, 'show'])->middleware('auth');

Route::get('/posts/checkSlug', [PostController::class, 'checkSlug']);
Route::get('/category/checkSlug', [CategoryController::class, 'checkSlug']);

Route::get('/home', [AllController::class, 'index'])->middleware('auth');
Route::resource('/posts', PostController::class)->middleware('auth');
Route::resource('/profile', ProfileController::class)->middleware('auth');
Route::resource('/role', RoleController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('guest');


// Route::get('/posts/create', [PostController::class, 'create']);
// Route::post('/posts/store', [PostController::class, 'store']);
// Route::post('/posts/{slug}', [PostController::class, 'destroy']);



// Route::get('/', function () {
//     return view('welcome');
// });
