<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        'id',
        'course_id',
        'name',
        'slug',
        'price',
        'img',
        'description',
        'visible',
        'resteurant_id'
    ];

    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function orders() {
        return $this->belongsToMany('App\Order');
    }

}
