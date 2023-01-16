<?php

namespace App\Models\Employees;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTimeEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'sign_in_datetime' => 'datetime',
        'sign_out_datetime' => 'datetime'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employees\Employee');
    }
}
