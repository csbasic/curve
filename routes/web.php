<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserRoleController;

// get home page
Route::get('/', [HomeController::class, 'index']);

// get service page
Route::get('/curve', [AboutController::class, 'curve']);
Route::get('/team', [AboutController::class, 'team']);

// contact routes
Route::get('/contact', [ContactController::class, 'createContact']);
Route::get('/contacts/{contact}/detail', [ContactController::class, 'showContact'])->middleware('auth');
Route::get('/contacts', [ContactController::class, 'listContacts'])->middleware('auth');
Route::get('/messages/{message}/detail')->middleware('auth');
Route::post('/message/save', [ContactController::class, 'store'])->middleware('auth');

// post routes
Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'showCreatePostForm'])->middleware('auth');
Route::put('/posts/{post}/update', [PostController::class, 'update']);
Route::post('/post/save', [PostController::class, 'store'])->middleware('auth');

Route::get('/posts/manage', [PostController::class, 'manage'])->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'showEditPostForm'])->middleware('auth');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->middleware('auth');
Route::get("/posts/{post}/detail", [PostController::class, 'show']);

//get user routes
Route::get('/users', [UserController::class, 'list'])->middleware('auth');
Route::get('/users/{user}/detail', [UserController::class, 'show'])->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'editProfile'])->middleware('auth');
Route::put('/users/{user}/update', [UserController::class, 'update'])->middleware('auth');
Route::post('/user', [UserController::class, 'store']);

// Authentication routes
Route::get('/sign-up', [UserController::class, 'showSignUpPage'])->middleware('guest');
Route::post('/authenticate/sign-up', [UserController::class, 'signUp'])->middleware('guest');
Route::post('/sign-out', [UserController::class, 'signOut'])->middleware('auth');
Route::get('/sign-in', [UserController::class, 'showSignInPage'])->name('signIn')->middleware('guest');
Route::post('/authenticate/sign-in', [UserController::class, 'signIn'])->middleware('guest');

// Category routes
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('auth');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->middleware('auth');
Route::post('/category/save', [CategoryController::class, 'store'])->middleware('auth');
Route::put('/categories/{category}/update', [CategoryController::class, 'update'])->middleware('auth');
Route::delete('/categories/{category}/delete', [CategoryController::class, 'destroy'])->middleware('auth');
Route::get('/categories', [CategoryController::class, 'list'])->middleware('auth');

// Roles Routes
Route::get('/roles', [RoleController::class, 'listRoles'])->middleware('auth');
Route::get('/role/create', [RoleController::class, 'create'])->middleware('auth');
Route::post('/role/store', [RoleController::class, 'store'])->middleware('auth');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->middleware('auth');
Route::put('/roles/{role}/update', [RoleController::class, 'update'])->middleware('auth');
Route::delete('/roles/{role}/delete', [RoleController::class, 'destroy'])->middleware('auth');

Route::get('/users/{user}/role/edit', [UserRoleController::class, 'getUserRoles'])->middleware('auth');
Route::put('/users/{user}/role/assign', [UserRoleController::class, 'assignRole'])->middleware('auth');
Route::delete('/roles/{role}/remove', [UserRoleController::class, 'removeRole'])->middleware('auth');

Route::get('/permissions-roles', [PermissionController::class, "getRolePermission"])->middleware('auth');
