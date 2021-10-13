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

    public function restaurants() {
        return $this->belongsToMany('App\Restaurant');
    }
}

