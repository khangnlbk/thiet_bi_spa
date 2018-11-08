<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "product_types";

    public function product() {
    	return $this->hasMany('App\Product', 'id_type', 'id');
    }
}
