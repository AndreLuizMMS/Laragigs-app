<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller {

  // home listing page 
  public static function index() {
    $tagFilter = request(['tag'][0]);
    $searchFilter = request(['search'][0]);

    $listings = Listing::latest()->tagFilter($tagFilter)->searchFilter($searchFilter)->paginate(10);
    foreach ($listings as $item) {
      $item->tags = tagsArray($item->tags);
    }
    return view('listing.index', ['listings' => $listings]);
  }

  // single listing page 
  public static function singleListing($id) {
    $listingItem = Listing::find($id);
    $listingItem->tags = tagsArray($listingItem->tags);
    if ($listingItem) {
      return view('listing.single-listing', ['listingItem' => $listingItem]);
    }
    return abort(404);
  }

  function createPost(Request $req) {
    $incomingFields = $req->validate([
      "company" => 'required',
      "title" => 'required',
      "location" => 'required',
      "email" => ['required', 'email'],
      "website" => 'required',
      "tags" => 'required',
      "description" => 'required',
    ]);
    if ($req->hasFile('logo')) {
      $incomingFields['logo_path'] = $req->file('logo')->store('logos', 'public');
    }

    Listing::create($incomingFields);
    return redirect('/')->with('message', 'Job posted successfully');
  }



  function edit(Request $req, $id) {
    $incomingFields = $req->validate([
      "company" => 'required',
      "title" => 'required',
      "location" => 'required',
      "email" => ['required', 'email'],
      "website" => 'required',
      "tags" => 'required',
      "description" => 'required',
    ]);

    $listingItem = Listing::find($id);

    if ($req->hasFile('logo')) {
      $incomingFields['logo_path'] = $req->file('logo')->store('logos', 'public');
    }

    $listingItem->update($incomingFields);
    return redirect('/')->with('message', 'Job edited successfully');
  }

  function delete($id) {
    $toBeDeleted =  Listing::find($id);
    $toBeDeleted->delete();


    return redirect('/')->with('message', 'Job deleted successfully');
  }
}

function tagsArray($str) {
  return explode(',', $str);
}
