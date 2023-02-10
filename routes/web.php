<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


//All Listings
Route::get('/', [ListingController::class, 'index']);


//Show create form
Route::get('/listings/create', [ListingController::class, 'create']);

//Store Listing Data 
Route::post('/listings', [ListingController::class, 'store']);

//Show edit form 
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//View Single Listing 
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show Register create form
Route::get('/register', [UserController::class, 'create']);

//Create new User
Route::post('/users', [UserController::class, 'store']);
