<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehousePurchaseOrderSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'delivery_date' => 'datetime:Y-m-d H:00:00'
    ];
}
