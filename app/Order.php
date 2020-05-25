<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = false;

    public function orderDetailOnOrder() {
        return $this->hasMany('App\OrderDetail','order_id','order_id');
    }

    public function orderOnCustomer() {
        return $this->belongsTo('App\Customer','cust_id','order_id');
    }
}
