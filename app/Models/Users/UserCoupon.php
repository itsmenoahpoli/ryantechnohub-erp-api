<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
