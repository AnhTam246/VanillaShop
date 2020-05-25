<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    public $timestamps = false;

    public function commentOnProduct() {
        return $this->belongsTo('App\Product','product_id','cment_id');
    }

    public function commentOnCustomer() {
        return $this->belongsTo('App\Customer','cust_id','cment_id');
    }
}
