<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;

// get home page
Route::get('/', [HomeController::class, 'index']);

// get service page
Route::get('/service', [ServiceController::class, 'index']);

// get contact page
Route::get('/contact', [ContactController::class, 'index']);

// get all posts
Route::get('/posts', [PostController::class, 'index']);

// show create post form
Route::get('/post/create', [PostController::class, 'showCreatePostForm'])->middleware('auth');

// update post
Route::put('/posts/{post}/update', [PostController::class, 'update'])->middleware('auth');

// save post
Route::post('/post/save', [PostController::class, 'store']);

// Manage posts
Route::get('/posts/manage', [PostController::class, 'manage'])->middleware('auth');

// show Edit post
Route::get('/posts/{post}/edit', [PostController::class, 'showEditPostForm'])->middleware('auth');

// Delete Listing
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->middleware('auth');

// Single post
Route::get("/posts/{post}/detail", [PostController::class, 'show']);

// Create user
Route::post('/user', [UserController::class, 'store']);

// show sign up form | name route "login" to function with middleware
Route::get('/sign-up', [UserController::class, 'showSignUpPage']);

// Create user
Route::post('/authenticate/sign-up', [UserController::class, 'signUp'])->middleware('guest');

// log user out 
Route::post('/sign-out', [UserController::class, 'signOut'])->middleware('auth');

// show login form | name route "login" to function with middleware
Route::get('/sign-in', [UserController::class, 'showSignInPage'])->name('login')->middleware('guest');

//login user
Route::post('/authenticate/sign-in', [UserController::class, 'signIn'])->middleware('guest');
