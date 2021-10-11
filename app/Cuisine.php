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

    public function cuisineRestaurants() {
        return $this->belongsToMany('App\Restaurant', 'cuisine_restaurant', 'cuisine_id', 'restaurant_id');
    }
}

