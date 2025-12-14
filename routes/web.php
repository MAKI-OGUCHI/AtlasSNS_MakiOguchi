<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FollowsController;

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



require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function (){
Route::get('top', [PostsController::class, 'index']);
Route::post('post/create',[PostsController::class,'create']);
Route::get('delete/{id}',[PostsController::class,'delete']);
Route::get('profile', [ProfileController::class, 'profile']);
Route::post('edit',[ProfileController::class,'edit']);

Route::get('search', [UsersController::class, 'search']);
//Route::post('userSearch',[UsersController::class,'userSearch']);

Route::get('follow-list', [FollowsController::class, 'followList']);
Route::get('follower-list', [FollowsController::class, 'followerList']);
Route::post('{id}/follow',[UsersController::class, 'follow']) -> name('follow');
Route::delete('{id}/unfollow', [UsersController::class, 'unfollow'])->name('unfollow');
Route::get('logout', [AuthenticatedSessionController::class, 'delete']);
Route::get('{id}/userprofile', [ProfileController::class, 'list'])->name('userprofile');
});
