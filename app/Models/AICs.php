<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AICs extends Model
{
    protected $table = 'aics';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'barangay',
        'department_function_code',
        'amount',
        'purpose',
        'assistance_date',

    ];


    protected $casts = [
        'assistance_date' => 'date',

    ];
}
