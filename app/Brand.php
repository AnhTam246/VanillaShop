<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';
    protected $primaryKey ='brand_id';
    public $timestamps = false;

    public function productOnBrand() {
        return $this->hasMany('App\Product','brand_id','product_id');
    }
    protected $fillable =['brand_id','brand_name','brand_description','brand_logo','brand_status'];
}
