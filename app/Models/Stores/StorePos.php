<?php

namespace App\Models\Stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorePos extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'password'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }
}
