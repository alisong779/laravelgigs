<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


//All Listings
Route::get('/', [ListingController::class, 'index']);

//Show Create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing Data 
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show edit form 
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//View Single Listing 
Route::get('/listings/{listing}', [ListingController::class, 'show']);



//Show Register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new User
Route::post('/users', [UserController::class, 'store']);

//Log User out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
