<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';
    protected $primaryKey ='slide_id';

    public $timestamps = false;

    public function slideOnProduct() {
        return $this->belongsTo('App\Product','product_id','slide_id');
    }
}
