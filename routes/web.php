<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('admin')->group(function () { 
       

    Route::middleware(['auth', 'role:admin'])->group(function () {

        Route::get('/settings', [SettingController::class, 'editSettings'])->name('settings.index');
        Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');

        Route::post('/posts/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');

    });

    Route::middleware(['auth', 'role:redacteur,admin'])->group(function () {
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    });

    Route::middleware(['auth'])->group(function () {
       
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/my-posts', [PostController::class, 'userIndex'])->name('posts.edit');
        
        Route::get('/my-posts', [PostController::class, 'userIndex'])->name('posts.index');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});



require __DIR__.'/auth.php';
