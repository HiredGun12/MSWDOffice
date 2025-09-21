<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pwd extends Model
{
    protected $table = 'pwd';

    protected $fillable = [
        'image',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'date_of_birth',
        'sex',
        'civil_status',
        'email_address',
        'mobile_no', 
        'landline',
        'house_no_street_name',
        'barangay',
        'city_municipality',
        'province',
        'region',
        'type_of_disability',
        'cause_of_disability',
        'educational_attainment',
        'employment_status',
        'category_of_employment',
        'nature_of_employment',
        'occupation',
        'blood_type',
        'organization_affiliated',
        'id_reference_no',
        'mothers_first_name',
        'mothers_middle_name',
        'mothers_last_name',
        'fathers_first_name',
        'fathers_middle_name',
        'fathers_last_name',
    ];
}
