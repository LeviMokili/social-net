<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdealikeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileControllerController;
use App\Models\Like;
use App\Models\ProfileController;
use Illuminate\Support\Facades\Route;

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




Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::post('/', [HomeController::class, 'index']);

Route::get('/register', [AuthController::class, 'register'])->name('save_user');
Route::post('/register', [AuthController::class, 'save_user'])->name('save_user');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_user'])->name('login_user');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/post_ideas', [IdeaController::class, 'post_ideas'])->name('post_ideas');

Route::get('/fetch_idea', [IdeaController::class, 'fetch_idea'])->name('fetch_idea');

Route::get('/fetch_like', [IdealikeController::class, 'fetch_like'])->name('fetch_like');
Route::post('/likepostuser', [IdealikeController::class, 'likepostuser'])->name('likepostuser');


Route::post('/add_comment_idea', [CommentController::class, 'add_comment_idea'])->name('add_comment_idea');
Route::get('/fetch_comment_idea', [CommentController::class, 'fetch_comment_idea'])->name('fetch_comment_idea');

Route::get('/profile', [ProfileControllerController::class, 'user_profile'])->name('profile');
