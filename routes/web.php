<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

	Route::middleware('auth')->group(function () {
		Route::view('/new-job', 'listing.create');
		Route::post('new-job/create', 'createPost');
		Route::get('/edit-job/{id}', function ($id) {
			return view('listing.edit-listing', ['listingItem' => Listing::find($id)]);
		});

		Route::post('/edit-job/{id}', 'edit');
		Route::delete('/delete-job/{id}', 'delete');
	});
});

Route::controller(UserController::class)->group(function () {
	Route::get('/manage', 'manageView')->middleware('auth');

	Route::middleware('guest')->group(function () {
		Route::view('/login', 'user.login');
		Route::view('/register', 'user.register');
		Route::post('/register', 'registerUser');
	});

	Route::middleware('auth')->group(function () {
		Route::post('/logout', 'logout');
		Route::post('/login', 'login')->name('login');
	});
});
