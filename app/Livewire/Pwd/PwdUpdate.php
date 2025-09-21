<?php

namespace App\Livewire\Pwd;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pwd;
use Illuminate\Http\UploadedFile;

class PwdUpdate extends Component
{
    use WithFileUploads;

    public $pwd;
    public $image;
    public $existingImage;

    public $first_name, $middle_name, $last_name, $suffix;
    public $date_of_birth, $sex, $civil_status, $email_address;
    public $mobile_no, $landline, $house_no_street_name, $barangay;
    public $city_municipality, $province, $region;
    public $type_of_disability, $cause_of_disability, $educational_attainment;
    public $employment_status, $category_of_employment, $nature_of_employment;
    public $occupation, $blood_type, $organization_affiliated, $id_reference_no;
    public $mothers_first_name, $mothers_middle_name, $mothers_last_name;
    public $fathers_first_name, $fathers_middle_name, $fathers_last_name;

    public function mount($id)
    {
        $this->pwd = Pwd::findOrFail($id);

        foreach ($this->pwd->getAttributes() as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        $this->existingImage = $this->pwd->image;
    }

    public function render()
    {
        return view('livewire.pwd.pwd-update');
    }

    public function submit()
    {
        // Base rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'date_of_birth' => 'required|date',
            'sex' => 'required|string',
            'civil_status' => 'required|string',
            'email_address' => 'nullable|email|max:255',
            'mobile_no' => 'nullable|string|max:20',
            'landline' => 'nullable|string|max:20',
            'house_no_street_name' => 'nullable|string|max:255',
            'barangay' => 'required|string|max:100',
            'city_municipality' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'type_of_disability' => 'required|string|max:100',
            'cause_of_disability' => 'required|string|max:100',
            'educational_attainment' => 'nullable|string|max:100',
            'employment_status' => 'nullable|string|max:100',
            'category_of_employment' => 'nullable|string|max:100',
            'nature_of_employment' => 'nullable|string|max:100',
            'occupation' => 'nullable|string|max:100',
            'blood_type' => 'nullable|string|max:255',
            'organization_affiliated' => 'nullable|string|max:100',
            'id_reference_no' => 'nullable|string|max:100',
            'mothers_first_name' => 'nullable|string|max:255',
            'mothers_middle_name' => 'nullable|string|max:255',
            'mothers_last_name' => 'nullable|string|max:255',
            'fathers_first_name' => 'nullable|string|max:255',
            'fathers_middle_name' => 'nullable|string|max:255',
            'fathers_last_name' => 'nullable|string|max:255',
        ];


        if ($this->image instanceof UploadedFile) {
            $rules['image'] = 'image|max:2048';
        }

        $this->validate($rules);

        // Use existing image if no new upload
        $imagePath = $this->existingImage;
        if ($this->image instanceof UploadedFile) {
            $imagePath = $this->image->store('pwd_photos', 'public');
        }

        // Update the record
        $this->pwd->update([
            'image' => $imagePath,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'suffix' => $this->suffix,
            'date_of_birth' => $this->date_of_birth,
            'sex' => $this->sex,
            'civil_status' => $this->civil_status,
            'email_address' => $this->email_address,
            'mobile_no' => $this->mobile_no,
            'landline' => $this->landline,
            'house_no_street_name' => $this->house_no_street_name,
            'barangay' => $this->barangay,
            'city_municipality' => $this->city_municipality,
            'province' => $this->province,
            'region' => $this->region,
            'type_of_disability' => $this->type_of_disability,
            'cause_of_disability' => $this->cause_of_disability,
            'educational_attainment' => $this->educational_attainment,
            'employment_status' => $this->employment_status,
            'category_of_employment' => $this->category_of_employment,
            'nature_of_employment' => $this->nature_of_employment,
            'occupation' => $this->occupation,
            'blood_type' => $this->blood_type,
            'organization_affiliated' => $this->organization_affiliated,
            'id_reference_no' => $this->id_reference_no,
            'mothers_first_name' => $this->mothers_first_name,
            'mothers_middle_name' => $this->mothers_middle_name,
            'mothers_last_name' => $this->mothers_last_name,
            'fathers_first_name' => $this->fathers_first_name,
            'fathers_middle_name' => $this->fathers_middle_name,
            'fathers_last_name' => $this->fathers_last_name,
        ]);

        session()->flash('success', 'PWD updated successfully.');
        return redirect()->route('pwd.list');
    }
}
