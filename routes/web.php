<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


//All Listings
Route::get('/', [ListingController::class, 'index']);


//Show create form
Route::get('/listings/create', [ListingController::class, 'create']);

//Single Listing 
Route::get('/listings/{listing}', [ListingController::class, 'show']);
