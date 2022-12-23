<?php

namespace App\Models\Stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Products\Product');
    }
}
