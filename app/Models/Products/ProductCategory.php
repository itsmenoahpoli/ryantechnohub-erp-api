<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany('App\Models\Products\Product');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Products\ProductCategoryImage');
    }
}
