<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey ='product_id';

    public $timestamps = false;

    public function productOnBrand() {
        return $this->belongsTo('App\Brand','brand_id','product_id');
    }

    public function productOnProductType() {
        return $this->belongsTo('App\ProductType','productType_id','product_id');
    }

    public function commentOnProduct() {
        return $this->hasMany('App\Comment','product_id','product_id');
    }

    public function orderDetailOnProduct() {
        return $this->hasMany('App\OrderDetail','product_id','product_id');
    }

    public function slideOnProduct() {
        return $this->hasMany('App\Slide','product_id','product_id');
    }
}
