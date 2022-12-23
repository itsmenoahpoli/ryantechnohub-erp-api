<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Products\ProductCategory');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Products\ProductImage');
    }

    public function stock_logs()
    {
        return $this->hasMany('App\Models\Products\ProductStockLog');
    }
}
