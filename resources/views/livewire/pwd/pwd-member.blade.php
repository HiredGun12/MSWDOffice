<div>
    <div class="relative mb-6 w-full max-w-7xl">
        <flux:heading size="xl" level="1" class="ml-100">{{ __('Persons with Disability') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6 ml-95">{{ __('Tanauan MSWD Persons with Disability') }}</flux:subheading>
    <flux:separator variant="subtle" />
        
    </div>
    <div>

    <div class="w-230 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8 p-4">
            
            <!-- Logo Image Section (LEFT) -->
            <div class="w-full md:w-1/2 flex justify-center md:justify-start">
                <img src="{{ asset('images/Tanauan.png') }}" alt="Tanauan Logo" class="w-80 h-36 object-contain rounded-lg s">
            </div>
    
            <!-- Upload Photo Section (RIGHT) -->
            <div>
                <h2 class="text-xl text-center font-semibold text-gray-700 dark:text-gray-200 mb-4">Profile</h2>
                <div>
                    @if (!$photo)
                        <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Select a photo:</label>
                        <input wire:model="photo" type="file" id="photo"
                               class="block w-50 text-sm text-gray-700 dark:text-gray-200 border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                    @else
                        <img src="{{ $photo->temporaryUrl() }}" class="mt-4 w-32 h-32 object-cover rounded shadow-md border border-gray-300"style="margin-left:30px;">
            
                        <!-- Hidden file input for changing photo -->
                        <input wire:model="photo" type="file" id="photo" class="hidden">
                        
                        <!-- Click to change photo button -->
                        <label for="photo" class="mt-2 inline-block text-sm text-blue-600 cursor-pointer hover:underline" style="margin-left:20px;">
                            Click to change photo
                        </label>
                    @endif
            
                    @error('photo') 
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                    @enderror
                </div>
            </div>
            
    </div>
</div>
    
    
    

        <form wire:submit.prevent="store" class="space-y-8">
            <div class="space-y-8">
                <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Personal Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
                                
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">First Name <span class="text-red-500">*</span></label>
                            <input wire:model="first_name" type="text" id="first_name" class="text-black dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2" required>
                        </div>
                        <div>
                            <label for="middle_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Middle Name</label>
                            <input wire:model="middle_name" type="text" id="middle_name" class="text-black dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Last Name <span class="text-red-500">*</span></label>
                            <input wire:model="last_name" type="text" id="last_name" class="text-black dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2" required>
                        </div>
                        <div>
                            <label for="suffix" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Suffix</label>
                            <input wire:model="suffix" type="text" id="suffix" class="text-black dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                        </div>
                        <div>
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                            <input wire:model="date_of_birth" type="date" id="date_of_birth" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2" required>
                        </div>
                        <div>
                            <label for="sex" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Sex <span class="text-red-500">*</span></label>
                            <select wire:model="sex" id="sex" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2" required>
                                <option value="" class="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="civil_status" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Civil Status <span class="text-red-500">*</span></label>
                            <select wire:model="civil_status" id="civil_status" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2" required>
                                <option value="" class="">Select</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                                <option value="Widowed/er">Widowed/er</option>
                                <option value="Co-habitation">Co-habitation</option>
                            </select>
                        </div>
                        <div>
                            <label for="blood_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Blood Type</label>
                            <select wire:model="blood_type" id="blood_type" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2" required>
                                <option value="" class="">Select</option>
                                <option value="A (Positive)">A (Positive)</option>
                                <option value="A (Negative)">A (Negative)</option>
                                <option value="B (Positive)">B (Positive)</option>
                                <option value="B (Negative)">B (Negative)</option>
                                <option value="AB (Positive)">AB (Positive)</option>
                                <option value="AB (Negative)">AB (Negative)</option>
                                <option value="O (Positive)">O (Positive)</option>
                                <option value="O (Negative)">O (Negative)</option>
                            </select>
                        </div>
                    </div>
                </div>

               <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-6">Contact Information</h2>
    
    <!-- 3 Columns in one row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Email Address -->
        <div>
            <label for="email_address" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Email Address
            </label>
            <input wire:model="email_address" type="email" id="email_address"
                   class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
        </div>

        <!-- Mobile No -->
        <div>
            <label for="mobile_no" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Mobile No.
            </label>
            <input wire:model="mobile_no" type="number" id="mobile_no"
                   class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
        </div>

        <!-- Landline -->
        <div>
            <label for="landline" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Landline
            </label>
            <input wire:model="landline" type="number" id="landline"
                   class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
        </div>

    </div>
</div>


                <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-6">Disability Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="type_of_disability" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Type of Disability</label>
                            <select wire:model="type_of_disability" id="type_of_disability" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2" required>
                                <option value="" class="">Select</option>
                                <option value="Deaf/Hard of Hearing">Deaf/Hard of Hearing</option>
                                <option value="Intellectually Disability">Intellectually Disability</option>
                                <option value="Learning Disability">Learning Disability</option>
                                <option value="Mental Disability">Mental Disability</option>
                                <option value="Orthopedic/Physical Disability">Orthopedic/Physical Disability</option>
                                <option value="Pyschosocial Disability">Pyschosocial Disability</option>
                                <option value="Speach and Language Disability">Speach and Language Disability</option>
                                <option value="Visual Disability">Visual Disability</option>
                                <option value="Cancer">Cancer (RA11215)</option>
                                <option value="Rare Disease">Rare Disease (RA10747)</option>
                            </select>
                    </div>
                        <div>
                            <label for="cause_of_disability" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Cause of Disability</label>
                            <select wire:model="cause_of_disability" id="cause_of_disability" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2" required>
                                <option value="" class="">Select</option>
                                <option value="Congental/Inborn">Congental/Inborn</option>
                                <option value="Autism">Autism</option>
                                <option value="ADHD">ADHD</option>
                                <option value="Cerebral Palsy">Cerebral Palsy</option>
                                <option value="Down Syndrome">Down Sysndrome</option>{{--need to clarify to the client--}}
                                <option value="Acquired">Acquired</option>
                                <option value="Chronic Illness">Chronic Illness</option>
                                <option value="Cerebral Palsy">Cerebral Palsy</option>
                                <option value="Injury">Injury</option>
                            </select>
                        </div>
                    </div>
                </div>

<div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Address Information</h2>
    
    <!-- Use 3 columns for desktop -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Region Dropdown -->
        <div>
    <label for="region" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
        Region <span class="text-red-500">*</span>
    </label>
    <p value="Region VIII" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
        Region VIII (Eastern Visayas)
    </p>
</div>


        <!-- Province Dropdown -->
        <div>
            <label for="province" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Province <span class="text-red-500">*</span>
            </label>
            <p value="Leyte" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                Leyte
            </p>
        </div>

        <!-- City/Municipality Dropdown -->
        <div>
            <label for="city_municipality" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                City/Municipality <span class="text-red-500">*</span>
            </label>
            <p value="Tanauan" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                Tanauan
            </p>
        </div>

        <!-- House No./Street (text input) -->
        <div class="md:col-span-2">
            <label for="house_no_street_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                House No. / Street Name
            </label>
            <input wire:model="house_no_street_name" type="text" id="house_no_street_name"
                   class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
        </div>

        <!-- Barangay Dropdown -->
        <div>
                <label for="barangay" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                    Barangay <span class="text-red-500">*</span>
                </label>
                <select wire:model="barangay" id="barangay"
                        class="text-gray-700 dark:text-gray-200 form-select block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2"
                        required>
                    <option value="">Select Barangay</option>
                    <option value="Ada">Ada</option>
                    <option value="Amanluran">Amanluran</option>
                    <option value="Arado">Arado</option>
                    <option value="Atipolo">Atipolo</option>
                    <option value="Balud">Balud</option>
                    <option value="Bangon">Bangon</option>
                    <option value="Bantagan">Bantagan</option>
                    <option value="Baras">Baras</option>
                    <option value="Binolo">Binolo</option>
                    <option value="Binongto-an">Binongto‑an</option>
                    <option value="Bislig">Bislig</option>
                    <option value="Buntay (Poblacion)">Buntay (Poblacion)</option>
                    <option value="Cabalagnan">Cabalagnan</option>
                    <option value="Cabarasan Guti">Cabarasan Guti</option>
                    <option value="Cabonga-an">Cabonga‑an</option>
                    <option value="Cabuynan">Cabuynan</option>
                    <option value="Cahumayhumayan">Cahumayhumayan</option>
                    <option value="Calogcog">Calogcog</option>
                    <option value="Calsadahay">Calsadahay</option>
                    <option value="Camire">Camire</option>
                    <option value="Canbalisara">Canbalisara</option>
                    <option value="Canramos (Poblacion)">Canramos (Poblacion)</option>
                    <option value="Catigbian">Catigbian</option>
                    <option value="Catmon">Catmon</option>
                    <option value="Cogon">Cogon</option>
                    <option value="Guindag-an">Guindag‑an</option>
                    <option value="Guingauan">Guingauan</option>
                    <option value="Hilagpad">Hilagpad</option>
                    <option value="Kiling">Kiling</option>
                    <option value="Lapay">Lapay</option>
                    <option value="Licod (Poblacion)">Licod (Poblacion)</option>
                    <option value="Limbuhan Daku">Limbuhan Daku</option>
                    <option value="Limbuhan Guti">Limbuhan Guti</option>
                    <option value="Linao">Linao</option>
                    <option value="Magay">Magay</option>
                    <option value="Maghulod">Maghulod</option>
                    <option value="Malaguicay">Malaguicay</option>
                    <option value="Maribi">Maribi</option>
                    <option value="Mohon">Mohon</option>
                    <option value="Pago">Pago</option>
                    <option value="Pasil">Pasil</option>
                    <option value="Picas">Picas</option>
                    <option value="Sacme">Sacme</option>
                    <option value="Salvador">Salvador</option>
                    <option value="San Isidro">San Isidro</option>
                    <option value="San Miguel (Poblacion)">San Miguel (Poblacion)</option>
                    <option value="San Roque (Poblacion)">San Roque (Poblacion)</option>
                    <option value="San Victor">San Victor</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Santa Elena">Santa Elena</option>
                    <option value="Santo Niño (Haclagan) (Poblacion)">Santo Niño (Haclagan) (Poblacion)</option>
                    <option value="Solano">Solano</option>
                    <option value="Talolora">Talolora</option>
                    <option value="Tugop">Tugop</option>
                </select>
            </div>
        </div>
    </div>



<div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-6">Education & Employment</h2>
    
    <!-- 3 columns grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Top Row: 3 fields -->
        <div>
            <label for="educational_attainment" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Educational Attainment
            </label>
            <select wire:model="educational_attainment" id="educational_attainment"
                    class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2"
                    required>
                <option value="">Select</option>
                <option value="None">None</option>
                <option value="Kindergarten">Kindergarten</option>
                <option value="Elementary">Elementary</option>
                <option value="Junior High School">Junior High School</option>
                <option value="Senior High School">Senior High School</option>
                <option value="College">College</option>
                <option value="Vocational">Vocational</option>
                <option value="Graduate Studies">Post Graduate</option>
            </select>
        </div>

        <div>
            <label for="employment_status" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Employment Status
            </label>
            <select wire:model="employment_status" id="employment_status"
                    class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2"
                    required>
                <option value="">Select</option>
                <option value="None">None</option>
                <option value="Employed">Employed</option>
                <option value="Unemployed">Unemployed</option>
                <option value="Self Employed">Self Employed</option>
            </select>
        </div>

        <div>
            <label for="category_of_employment" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Category of Employment
            </label>
            <select wire:model="category_of_employment" id="category_of_employment"
                    class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2"
                    required>
                <option value="">Select</option>
                <option value="None">None</option>
                <option value="Goverment">Goverment</option>
                <option value="Private">Private</option>
            </select>
        </div>

        <!-- Bottom Row: 2 fields -->
        <div>
            <label for="nature_of_employment" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Nature of Employment
            </label>
            <select wire:model="nature_of_employment" id="nature_of_employment"
                    class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2"
                    required>
                <option value="">Select</option>
                <option value="None">None</option>
                <option value="Permanent/Regular">Permanent/Regular</option>
                <option value="Casual">Casual</option>
                <option value="Seasonal">Seasonal</option>
                <option value="Emergency">Emergency</option>
            </select>
        </div>

        <div>
            <label for="occupation" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                Occupation
            </label>
            <input wire:model="occupation" type="text" id="occupation"
                   class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
        </div>

    </div>
</div>


                <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Other Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="organization_affiliated" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Organization Affiliated</label>
                            <input wire:model="organization_affiliated" type="text" id="organization_affiliated" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                        </div>
                        <div>
                            <label for="id_reference_no" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">ID Reference No.</label>
                            <input wire:model="id_reference_no" type="text" id="id_reference_no" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg border border-gray-200 mt-8">
                <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-6">Parent Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div>
                        <label for="mothers_first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Mother's First Name</label>
                        <input wire:model="mothers_first_name" type="text" id="mothers_first_name" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                    </div>
                    <div>
                        <label for="mothers_middle_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Mother's Middle Name</label>
                        <input wire:model="mothers_middle_name" type="text" id="mothers_middle_name" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                    </div>
                    <div>
                        <label for="mothers_last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Mother's Last Name</label>
                        <input wire:model="mothers_last_name" type="text" id="mothers_last_name" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                    </div>

                    <div>
                        <label for="fathers_first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Father's First Name</label>
                        <input wire:model="fathers_first_name" type="text" id="fathers_first_name" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                    </div>
                    <div>
                        <label for="fathers_middle_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Father's Middle Name</label>
                        <input wire:model="fathers_middle_name" type="text" id="fathers_middle_name" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                    </div>
                    <div>
                        <label for="fathers_last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Father's Last Name</label>
                        <input wire:model="fathers_last_name" type="text" id="fathers_last_name" class="text-gray-700 dark:text-gray-200 form-input block w-full border border-gray-700 dark:border-gray-200 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm p-2">
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-2 mt-4">
                <a type="cancel" href="{{ route('pwd.list') }}" class="cursor-pointer px-8 py-2 text-xs font-medium text-white bg-red-600 rounded-lg shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200">
                    Cancel
                </a>

                <button type="submit" class="cursor-pointer px-8 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                    Submit
                </button>
            </div>
          </div>
        </form>
    </div>
</div>
</div>
</div>