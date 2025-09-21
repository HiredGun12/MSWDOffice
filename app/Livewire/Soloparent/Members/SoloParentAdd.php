<?php

namespace App\Livewire\Soloparent\Members;

use Livewire\Component;
use App\Models\SoloParent;
use App\Models\SoloParentFamily;
use App\Models\SoloParentEmergency;
use Carbon\Carbon;

class SoloParentAdd extends Component
{
    // Parent fields
    public $case_number, $full_name, $address, $age, $sex, $civil_status;
    public $occupation, $religion, $educational_attainment, $company_agency;
    public $contact_no, $email_address, $birth_place, $date_of_birth;
    public $monthly_income;
    public $patawid_beneficiary = false;
    public $indigenous_person = false;
    public $lgbtq = false;

    // Family members
    public $familyMembers = [];

    // Emergency contacts
    public $emergencyContacts = [];

    protected $rules = [
        'case_number' => 'required|integer',
        'full_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'age' => 'required|integer',
        'sex' => 'required|string',
        'civil_status' => 'required|string',
        'occupation' => 'required|string|max:255',
        'religion' => 'required|string|max:255',
        'educational_attainment' => 'required|string|max:255',
        'contact_no' => 'required|string|max:50',
        'birth_place' => 'required|string|max:255',
        'date_of_birth' => 'nullable|date',
        'monthly_income' => 'nullable|string|max:50',
    ];

    public function mount()
    {
        // Initialize one empty family member and one emergency contact
        $this->familyMembers[] = [
            'name' => '',
            'relationship' => '',
            'age' => '',
            'birthday' => '',
            'civil_status' => '',
            'occupation' => '',
            'educational' => '',
            'monthly' => '',
        ];

        $this->emergencyContacts[] = [
            'name' => '',
            'relationship' => '',
            'contact_no' => '',
            'address' => '',
        ];
    }

    // Update age when date_of_birth changes
    public function updatedDateOfBirth($value)
    {
        if ($value) {
            $this->age = Carbon::parse($value)->age;
        }
    }

    // Update family member age when birthday changes
    public function updatedFamilyMembers($value, $name)
    {
        // $name format: familyMembers.0.birthday
        $parts = explode('.', $name);
        if (count($parts) === 3 && $parts[2] === 'birthday' && $value) {
            $index = $parts[1];
            $this->familyMembers[$index]['age'] = Carbon::parse($value)->age;
        }
    }

    // Add new family member
    public function addFamilyMember()
    {
        $this->familyMembers[] = [
            'name' => '',
            'relationship' => '',
            'age' => '',
            'birthday' => '',
            'civil_status' => '',
            'occupation' => '',
            'educational' => '',
            'monthly' => '',
        ];
    }

    // Remove family member
    public function removeFamilyMember($index)
    {
        unset($this->familyMembers[$index]);
        $this->familyMembers = array_values($this->familyMembers);
    }

    // Add emergency contact
    public function addEmergencyContact()
    {
        $this->emergencyContacts[] = [
            'name' => '',
            'relationship' => '',
            'contact_no' => '',
            'address' => '',
        ];
    }

    // Remove emergency contact
    public function removeEmergencyContact($index)
    {
        unset($this->emergencyContacts[$index]);
        $this->emergencyContacts = array_values($this->emergencyContacts);
    }

    // Submit form
    public function submit()
    {
        $this->validate();

        // Create SoloParent
        $parent = SoloParent::create([
            'case_number' => $this->case_number,
            'full_name' => $this->full_name,
            'address' => $this->address,
            'age' => $this->age,
            'sex' => $this->sex,
            'civil_status' => $this->civil_status,
            'occupation' => $this->occupation,
            'religion' => $this->religion,
            'educational_attainment' => $this->educational_attainment,
            'company_agency' => $this->company_agency,
            'contact_no' => $this->contact_no,
            'email_address' => $this->email_address,
            'birth_place' => $this->birth_place,
            'date_of_birth' => $this->date_of_birth,
            'monthly_income' => $this->monthly_income,
            'patawid_beneficiary' => $this->patawid_beneficiary,
            'indigenous_person' => $this->indigenous_person,
            'lgbtq' => $this->lgbtq,
        ]);

        // Save family members
        foreach ($this->familyMembers as $member) {
            SoloParentFamily::create([
                'solo_parent_id' => $parent->id,
                'name' => $member['name'],
                'relationship' => $member['relationship'],
                'age' => $member['age'],
                'birthday' => $member['birthday'],
                'civil_status' => $member['civil_status'],
                'occupation' => $member['occupation'],
                'educational' => $member['educational'],
                'monthly' => $member['monthly'],
            ]);
        }

        // Save emergency contacts
        foreach ($this->emergencyContacts as $contact) {
            SoloParentEmergency::create([
                'solo_parent_id' => $parent->id,
                'name' => $contact['name'],
                'relationship' => $contact['relationship'],
                'contact_no' => $contact['contact_no'],
                'address' => $contact['address'],
            ]);
        }

        session()->flash('success', 'Solo Parent registered successfully!');

        // Reset form
        $this->reset([
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
            'familyMembers',
            'emergencyContacts'
        ]);

        // Add one blank row again
        $this->mount();

        redirect()->route('solo-parent.list');
    }

    public function render()
    {
        return view('livewire.soloparent.members.solo-parent-add');
    }
}
