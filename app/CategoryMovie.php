<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMovie extends Model
{
    protected $fillable = [
        'movie_id', 'category_id',
    ];
}