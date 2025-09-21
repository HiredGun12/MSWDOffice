<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchivedSeniorCitizen extends Model
{
    protected $table = 'archived_senior_citizens';

    protected $fillable = [
        'name',
        'address',
        'age',
        'contact_person',
        'birth_date',
        'sex',
    ];
}
