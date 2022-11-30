<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);
Route::post('/addpost', [PostController::class, 'addPost'])->name('addPost');
Route::get('/delete/{id}', [PostController::class, 'deletePost'])->middleware(['auth']);
Route::get('/edit/{id}', [PostController::class, 'edit'])->middleware(['auth']);
Route::post('/editpost', [PostController::class, 'editPost'])->name('editPost');

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');

Route::post('/signup', [UserController::class, 'registerUser'])->name('register');
Route::post('/login', [UserController::class, 'loginUser'])->name('login');
Route::get('/logout', [UserController::class, 'logoutUser'])->name('logout');
