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

    public function restaurant() {
        return $this->belongsToMany('App\Restaurant', 'cuisine_id', 'restaurant_id',);
    }
}

