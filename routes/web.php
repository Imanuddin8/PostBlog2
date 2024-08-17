<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KomenController;


Route::GET('/', [PostController::class, 'index'])->name('post');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/posts', [PostController::class, 'index'])->name('post.index');
// });

Route::middleware(['auth', 'verified'])->group(function(){
    Route::GET('/index', [PostController::class, 'index'])->name('post.index');
});

Route::middleware('auth')->group(function () {

     // Post
     Route::GET('/index', [PostController::class, 'index'])->name('post.index');
     Route::POST('/store', [PostController::class, 'store'])->name('post.store');
     Route::DELETE('/store/delete/{id}', [PostController::class, 'delete'])->name('post.delete');

     // Komen
     Route::GET('/komen/{id}', [KomenController::class, 'index'])->name('komen.index');
     Route::POST('/komen/create/{id}', [KomenController::class, 'create'])->name('komen.create');
     Route::GET('/komen/edit/{id}', [KomenController::class, 'edit'])->name('komen.edit');
     Route::PUT('/komen/update/{id}', [KomenController::class, 'update'])->name('komen.update');
     Route::DELETE('/komen/delete/{id}', [KomenController::class, 'delete'])->name('komen.delete');

     // Profile
     Route::GET('/profile{id}', [ProfileController::class, 'index'])->name('profile.index');
     Route::GET('/profile/edit/{id}', [ProfileController::class, 'editProfile'])->name('profile.edit');
     Route::PUT('/profile/update/{id}', [ProfileController::class, 'updateProfile'])->name('profile.update');
     Route::DELETE('/profile/post/delete/{id}', [ProfileController::class, 'delete'])->name('profile.deletePost');
     Route::GET('/profile/post/edit/{id}', [ProfileController::class, 'edit'])->name('profile.editPost');
     Route::PUT('/profile/post/update/{id}', [ProfileController::class, 'update'])->name('profile.updatePost');
});

require __DIR__.'/auth.php';
