<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model {
    use HasFactory;

    protected $guarded = [];

    function scopeTagFilter(Builder $query, $tagFilter) { //array $filter = tags q vao nos parametros 
        if ($tagFilter) {
            $query->where('tags', 'like', '%' . $tagFilter . '%');
        }
    }
    function scopeSearchFilter(Builder $query, $searchFilter) { //array $filter = tags q vao nos parametros 
        if ($searchFilter) {
            $query->where('company', 'like', '%' . $searchFilter . '%')
                ->orWhere('title', 'like', '%' . $searchFilter . '%');
        }
    }
}
