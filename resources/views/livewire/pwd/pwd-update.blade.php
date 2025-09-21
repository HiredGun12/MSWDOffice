<div>
    <h2 class="text-2xl font-bold mb-4">Update Person with Disability</h2>

    @if (session()->has('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-6">
        <!-- Profile Image -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
            <div class="mt-2">
                @if ($image instanceof \Illuminate\Http\UploadedFile)
                    <img src="{{ $image->temporaryUrl() }}" class="h-32 w-32 rounded object-cover">
                @elseif ($existingImage)
                    <img src="{{ Storage::url($existingImage) }}" class="h-32 w-32 rounded object-cover">
                @else
                    <p class="text-sm text-gray-500">No image available</p>
                @endif
            </div>
            <input type="file" wire:model="image" class="mt-2">
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Personal Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach([
                'first_name' => 'First Name',
                'middle_name' => 'Middle Name',
                'last_name' => 'Last Name',
                'suffix' => 'Suffix',
                'date_of_birth' => 'Date of Birth',
                'sex' => 'Sex',
                'civil_status' => 'Civil Status',
                'email_address' => 'Email Address',
                'mobile_no' => 'Mobile No.',
                'landline' => 'Landline',
                'house_no_street_name' => 'House No. / Street',
                'barangay' => 'Barangay',
                'city_municipality' => 'City / Municipality',
                'province' => 'Province',
                'region' => 'Region',
                'educational_attainment' => 'Educational Attainment',
                'employment_status' => 'Employment Status',
                'category_of_employment' => 'Category of Employment',
                'nature_of_employment' => 'Nature of Employment',
                'occupation' => 'Occupation',
                'blood_type' => 'Blood Type',
                'organization_affiliated' => 'Organization Affiliated',
                'id_reference_no' => 'ID Reference No',
                'mothers_first_name' => "Mother's First Name",
                'mothers_middle_name' => "Mother's Middle Name",
                'mothers_last_name' => "Mother's Last Name",
                'fathers_first_name' => "Father's First Name",
                'fathers_middle_name' => "Father's Middle Name",
                'fathers_last_name' => "Father's Last Name",
            ] as $field => $label)
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>

                    @if (str_contains($field, 'date'))
                        <input type="date" wire:model="{{ $field }}" class="w-full border rounded p-2">

                    @elseif ($field === 'sex')
                        <select wire:model="{{ $field }}" class="w-full border rounded p-2">
                            <option value="">-- Select --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                    @elseif ($field === 'civil_status')
                        <select wire:model="{{ $field }}" class="w-full border rounded p-2">
                            <option value="">-- Select Civil Status --</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>

                    @elseif ($field === 'educational_attainment')
                        <select wire:model="{{ $field }}" class="w-full border rounded p-2">
                            <option value="">-- Select Education --</option>
                            <option value="Elementary">Elementary</option>
                            <option value="High School">High School</option>
                            <option value="Vocational">Vocational</option>
                            <option value="College">College</option>
                            <option value="Post Graduate">Post Graduate</option>
                        </select>

                    @elseif ($field === 'employment_status')
                        <select wire:model="{{ $field }}" class="w-full border rounded p-2">
                            <option value="">-- Select Employment Status --</option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Student">Student</option>
                            <option value="Retired">Retired</option>
                        </select>

                    @elseif ($field === 'category_of_employment')
                        <select wire:model="{{ $field }}" class="w-full border rounded p-2">
                            <option value="">-- Select Category --</option>
                            <option value="Government">Government</option>
                            <option value="Private">Private</option>
                            <option value="Self-employed">Self-employed</option>
                        </select>

                    @elseif ($field === 'nature_of_employment')
                        <select wire:model="{{ $field }}" class="w-full border rounded p-2">
                            <option value="">-- Select Nature --</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Casual">Casual</option>
                            <option value="Temporary">Temporary</option>
                        </select>

                    @elseif ($field === 'occupation')
                        <select wire:model="{{ $field }}" class="w-full border rounded p-2">
                            <option value="">-- Select Occupation --</option>
                            <option value="Farmer">Farmer</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Laborer">Laborer</option>
                            <option value="Vendor">Vendor</option>
                            <option value="Other">Other</option>
                        </select>

                    @elseif ($field === 'email_address')
                        <input type="email" wire:model="{{ $field }}" class="w-full border rounded p-2">

                    @elseif ($field === 'mobile_no' || $field === 'landline')
                        <input type="number" wire:model="{{ $field }}" class="w-full border rounded p-2" min="0">

                    @else
                        <input type="text" wire:model="{{ $field }}" class="w-full border rounded p-2">
                    @endif

                    @error($field) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            @endforeach

            <!-- Type of Disability Dropdown -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Type of Disability</label>
                <select wire:model="type_of_disability" class="w-full border rounded p-2">
                    <option value="">-- Select Disability Type --</option>
                    <option value="Visual">Visual</option>
                    <option value="Hearing">Hearing</option>
                    <option value="Mobility">Mobility</option>
                    <option value="Cognitive">Cognitive</option>
                    <option value="Psychosocial">Psychosocial</option>
                    <option value="Speech and Language">Speech and Language</option>
                    <option value="Multiple Disabilities">Multiple Disabilities</option>
                    <option value="Others">Others</option>
                </select>
                @error('type_of_disability') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Cause of Disability Dropdown -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Cause of Disability</label>
                <select wire:model="cause_of_disability" class="w-full border rounded p-2">
                    <option value="">-- Select Cause --</option>
                    <option value="Congenital/Inborn">Congenital/Inborn</option>
                    <option value="Illness">Illness</option>
                    <option value="Injury">Injury</option>
                    <option value="Others">Others</option>
                </select>
                @error('cause_of_disability') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <button type="submit"
                class="cursor-pointer px-2 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Update
            </button>
        </div>
    </form>
</div>
