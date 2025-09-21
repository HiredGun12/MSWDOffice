<?php

namespace App\Livewire\Pwd;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pwd;

class PwdMember extends Component
{
    use WithFileUploads;

    public $photo;
    public $first_name, $middle_name, $last_name, $suffix;
    public $date_of_birth, $sex, $civil_status;
    public $email_address, $mobile_no, $landline;
    public $address, $house_no_street_name, $barangay;
    public $type_of_disability, $cause_of_disability;
    public $educational_attainment, $employment_status, $category_of_employment, $nature_of_employment, $occupation;
    public $blood_type, $organization_affiliated, $id_reference_no;
    public $mothers_first_name, $mothers_middle_name, $mothers_last_name;
    public $fathers_first_name, $fathers_middle_name, $fathers_last_name;
    public $province = 'Leyte';
    public $region = 'Region VIII (Eastern Visayas)';
    public  $city_municipality ="Tanauan"; 

    public function store()
    {
        $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'sex' => 'required|string',
            'civil_status' => 'required|string',
            'barangay' => 'required|string',
            'city_municipality' => 'required|string',
            'province' => 'required|string',
            'region' => 'required|string',
            'type_of_disability' => 'required|string',
            'cause_of_disability' => 'required|string',
            'educational_attainment' => 'required|string',
            'employment_status' => 'required|string',
            'photo' => 'nullable|image|max:2048',
            'mobile_no' => 'nullable|string|max:20',
            'landline' => 'nullable|string|max:20',
        ]);

        $photoPath = $this->photo ? $this->photo->store('pwd_photos', 'public') : null;

        Pwd::create(array_merge(
            $this->only([
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
                'address',
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
            ]),
            ['image' => $photoPath] 
        ));
        session()->flash('success', 'Person got added successfully.');

        return redirect()->route('pwd.list');
    }


    public function render()
    {
        return view('livewire.pwd.pwd-member');
    }
}