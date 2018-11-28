<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "product_types";

    protected $fillable = [
	    'name',
	    'category',
        'description',
        'image',
        'parent_type'
    ];

    public function product() {
    	return $this->hasMany('App\Product', 'id_type', 'id');
    }
}
