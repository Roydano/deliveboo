<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
       'name'
    ];

    public function plates() {
        return $this->hasMany('App\Plate');
    }
}
