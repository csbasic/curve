<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeamController;

// get home page
Route::get('/', [HomeController::class, 'index']);

// get service page
Route::get('/curve', [AboutController::class, 'curve']);
Route::get('/team', [AboutController::class, 'team']);

// get contact page
Route::get('/contact', [ContactController::class, 'createContact']);
Route::get('/contacts/{contact}/detail', [ContactController::class, 'showContact'])->middleware('auth');
Route::get('/contacts', [ContactController::class, 'listContacts'])->middleware('auth');

// get contact detail
Route::get('/messages/{message}/detail')->middleware('auth');

// save message
Route::post('/message/save', [ContactController::class, 'store']);

// get all posts
Route::get('/posts', [PostController::class, 'index']);

// show create post form
Route::get('/post/create', [PostController::class, 'showCreatePostForm'])->middleware('auth');

// update post
Route::put('/posts/{post}/update', [PostController::class, 'update']);

// save post
Route::post('/post/save', [PostController::class, 'store'])->middleware('auth');

// Manage posts
Route::get('/posts/manage', [PostController::class, 'manage'])->middleware('auth');

// show Edit post
Route::get('/posts/{post}/edit', [PostController::class, 'showEditPostForm'])->middleware('auth');

// Delete Listing
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->middleware('auth');

// Single post
Route::get("/posts/{post}/detail", [PostController::class, 'show']);

// get profile page
Route::get('/users/{user}/detail', [UserController::class, 'show'])->middleware('auth');

// get edit profile page
Route::get('/users/{user}/edit', [UserController::class, 'editProfile'])->middleware('auth');

// get edit profile page
Route::put('/users/{user}/update', [UserController::class, 'update'])->middleware('auth');

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
