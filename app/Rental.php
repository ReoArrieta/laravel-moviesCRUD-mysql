<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'start_date', 'end_date','total','user_id','status_id',
    ];
}
