<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'producttype';
    protected $primaryKey ='productType_id';
    public $timestamps = false;

    public function productOnProductType() {
        return $this->hasMany('App\Product','productType_id','product_id');
    }

    public function getParent(){
        return $this->hasMany(ProductType::class,'parent_id','productType_id');
    }

    protected $fillable =['productType_id','productType_name','productType_description','productType_image','productType_status'];
}
