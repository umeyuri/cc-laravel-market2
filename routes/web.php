<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;


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

Route::get('/', [ItemController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/item', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::post('/items/{item}/update', [ItemController::class, 'update'])->name('items.update');
Route::get('/items/{item}/edit_image', [ItemController::class, 'editImage'])->name('items.edit_image');
Route::post('/items/{item}/update_image', [ItemController::class, 'updateImage'])->name('items.update_image');

Route::get('/likes', [LikeController::class, 'index'])->name('likes.index');
Route::patch('/items/{item}/toggle_like', [LikeController::class, 'toggleLike'])->name('items.toggle_like');

Route::get('/items/{item}/confirm', [OrderController::class, 'confirm'])->name('items.confirm');
Route::post('/items/{item}/finish', [OrderController::class, 'finish'])->name('items.finish');

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
Route::get('profile/edit_image', [UserController::class, 'editImage'])->name('profile.edit_image');
Route::post('profile/update_image', [UserController::class, 'updateImage'])->name('profile.update_image');

Route::get('/users/{user}/exhibitions', [ItemController::class, 'exhibition'])->name('users.exhibitions');
Route::delete('/items/{item}/delete', [ItemController::class, 'destroy'])->name('items.delete');