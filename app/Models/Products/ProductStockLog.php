<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStockLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Models\Products\Product');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }
}
