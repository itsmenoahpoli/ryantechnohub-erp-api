<?php

namespace App\Models\Accountings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountReminder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'reminder_date' => 'date'
    ];
}
