<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieRental extends Model
{
    protected $fillable = [
        'movie_id', 'rental_id','price','observation',
    ];
}