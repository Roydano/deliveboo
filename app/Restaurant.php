<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'p_iva',
        'img'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function plates()
    {
        return $this->hasMany('App\Plate');
    }

    public function cuisineRestaurants()
    {
        return $this->belongsToMany('App\Cuisine', 'cuisine_restaurant', 'cuisine_id', 'restaurant_id');
    }
}
