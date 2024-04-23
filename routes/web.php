<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ItemController::class, 'index'])->name('items.index');

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/likes', [LikeController::class, 'index'])->name('likes.index');

Route::get('users/{user}/exhibitions', [ItemController::class, 'exhibition'])->name('users.exhibitions');