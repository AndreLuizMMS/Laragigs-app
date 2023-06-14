<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
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

Route::controller(ListingController::class)->group(function () {
	Route::get('/', 'index');
	Route::get('/listing/{id}', 'singleListing');
	Route::post('new-job/create', 'createPost');
	Route::view('/new-job', 'listing.create');

	Route::get('/edit-job/{id}', function ($id) {
		$listingItem = Listing::find($id);
		return view('listing.edit-listing', ['listingItem' => $listingItem]);
	});
	Route::post('/edit-job/{id}', 'edit');
	Route::delete('/delete-job/{id}', 'delete');
});

Route::controller(UserController::class)->group(function () {
	Route::view('/register', 'user.register');
});
