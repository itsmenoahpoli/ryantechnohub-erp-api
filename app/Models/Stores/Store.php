<?php

namespace App\Models\Stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany('App\Models\Stores\StoreProduct');
    }

    public function pos()
    {
        return $this->hasOne('App\Models\Stores\StorePos');
    }
}
