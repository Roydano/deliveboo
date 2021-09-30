<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'date',
        'name',
        'address',
        'phone',
        'notes'
    ];

    public function plates() {
        return $this->belongsToMany('App\Plate', 'order_id', 'plate_id', 'quantity');
    }
}
