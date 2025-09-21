<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SoloParent extends Model
{
    use HasFactory, SoftDeletes;
    
    // Table name (optional if it matches Laravel naming)
    protected $table = 'solo_parent';

    // Mass assignable fields
    protected $fillable = [
        'case_number',
        'full_name',
        'address',
        'age',
        'sex',
        'civil_status',
        'occupation',
        'religion',
        'educational_attainment',
        'company_agency',
        'contact_no',
        'email_address',
        'birth_place',
        'date_of_birth',
        'monthly_income',
        'patawid_beneficiary',
        'indigenous_person',
        'lgbtq',
    ];

    /**
     * Relationship: One Solo Parent has many Family Members
     */
    public function familyMembers()
    {
        return $this->hasMany(SoloParentFamily::class, 'solo_parent_id');
    }

    /**
     * Relationship: One Solo Parent has many Emergency Contacts
     */
    public function emergencyContacts()
    {
        return $this->hasMany(SoloParentEmergency::class, 'solo_parent_id');
    }
}
