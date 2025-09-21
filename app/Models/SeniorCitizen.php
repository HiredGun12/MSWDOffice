<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SeniorCitizen extends Model
{
    protected $table = 'senior_citizen';

    protected $fillable = [
        'full_name',
        'age', // you can keep this in DB if needed, but we'll override accessor
        'gender',
        'birthday',
        'contact_person',
        'address'
    ];

    // ✅ Auto-calculate age whenever accessed
    public function getAgeAttribute()
    {
        return $this->birthday
            ? Carbon::parse($this->birthday)->age
            : null;
    }
}
