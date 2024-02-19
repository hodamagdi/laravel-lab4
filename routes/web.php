<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'delete'])->name('profile.destroy');
    
    // create post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    
    // store posts
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    // edit post 
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    
    // update post
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    
    // delete post 
    Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('posts.destroy');
});

//________________________________users____________________________//

// display all users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// create user
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// store users
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// show specific user ID
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// edit user ID
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// update user ID
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// delete user ID
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.destroy');

//________________________________posts____________________________//

// display all posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


// show specific post 
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');




//fallback route to catch any other route
Route::fallback(function () {
    return ('this page not found');
});

require __DIR__.'/auth.php';
