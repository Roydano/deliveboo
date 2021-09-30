<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $fillable = [
        'id',
        'name',
        'slug',
        'img'
    ];

    public function cuisine() {
        return $this->belongsToMany('App\Cuisine', 'cuisine_id', 'restaurant_id',);
    }
}

