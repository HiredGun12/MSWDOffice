<div class=" bg-white dark:bg-gray-800">
    {{-- Success Message --}}
    @if(session()->has('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-semibold mb-6 text-gray-700 dark:text-gray-200">Solo Parent Registration</h2>

    <form wire:submit.prevent="submit" class="space-y-10">
        {{-- Parent Information --}}
        <div class="space-y-4">
            <h3 class="text-xl font-semibold border-b border-gray-300 dark:border-neutral-600 pb-2 text-gray-700 dark:text-gray-200">Parent Information</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <input wire:model="case_number" type="number" placeholder="Case Number" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="full_name" type="text" placeholder="Full Name" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="address" type="text" placeholder="Address" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="age" type="number" placeholder="Age" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <select wire:model="sex" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                
                <select wire:model="civil_status" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                     <option value="">Select Civil Status</option>
                     <option value="Single">Single</option>
                     <option value="Married">Married</option>
                     <option value="Widowed">Widowed</option>
                     <option value="Separated">Separated</option>
                     <option value="Divorced">Divorced</option>
              </select>

                <input wire:model="occupation" type="text" placeholder="Occupation" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="religion" type="text" placeholder="Religion" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="educational_attainment" type="text" placeholder="Education" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="company_agency" type="text" placeholder="Company/Agency" class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="contact_no" type="number" placeholder="Contact No" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="email_address" type="email" placeholder="Email Address" class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="birth_place" type="text" placeholder="Birth Place" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input wire:model="date_of_birth" type="date" placeholder="Date of Birth" required class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
        </div>

        {{-- Additional Information --}}
        <div class="space-y-4">
            <h3 class="text-xl font-semibold border-b border-gray-300 dark:border-neutral-600 pb-2 text-gray-700 dark:text-gray-200">Additional Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <input wire:model="monthly_income" type="number" placeholder="Monthly Income" class="border border-gray-300 dark:border-neutral-600 rounded p-3 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <div class="flex items-center space-x-2">
                    <input wire:model="patawid_beneficiary" type="checkbox" id="patawid_beneficiary" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="patawid_beneficiary" class="text-gray-700 dark:text-gray-200 text-xs">Patawid Beneficiary</label>
                </div>
                <div class="flex items-center space-x-2">
                    <input wire:model="indigenous_person" type="checkbox" id="indigenous_person" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="indigenous_person" class="text-gray-700 dark:text-gray-200 text-xs">Indigenous Person</label>
                </div>
                <div class="flex items-center space-x-2">
                    <input wire:model="lgbtq" type="checkbox" id="lgbtq" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="lgbtq" class="text-gray-700 dark:text-gray-200 text-xs">LGBTQ</label>
                </div>
            </div>
        </div>

        {{-- Family Members --}}
        <div class="space-y-4">
            <h3 class="text-xl font-semibold border-b border-gray-300 dark:border-neutral-600 pb-2 text-gray-700 dark:text-gray-200 flex justify-between items-center">
                Family Members
                <button type="button" wire:click="addFamilyMember" class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">Add Member</button>
            </h3>

            @foreach($familyMembers as $index => $member)
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 bg-gray-50 dark:bg-neutral-800 p-4 rounded-lg border border-gray-200 dark:border-neutral-700">
                <input wire:model="familyMembers.{{ $index }}.name" type="text" placeholder="Name" required class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <input wire:model="familyMembers.{{ $index }}.relationship" type="text" placeholder="Relationship" required class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <input wire:model="familyMembers.{{ $index }}.age" type="number" placeholder="Age" class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <input wire:model="familyMembers.{{ $index }}.birthday" type="date" placeholder="Birthday" class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <select wire:model="familyMembers.{{ $index }}.civil_status" class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                     <option value="">Select Civil Status</option>
                     <option value="Single">Single</option>
                     <option value="Married">Married</option>
                     <option value="Widowed">Widowed</option>
                     <option value="Separated">Separated</option>
                     <option value="Divorced">Divorced</option>
              </select>

                <input wire:model="familyMembers.{{ $index }}.occupation" type="text" placeholder="Occupation" class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <input wire:model="familyMembers.{{ $index }}.educational" type="text" placeholder="Education" class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <input wire:model="familyMembers.{{ $index }}.monthly" type="number" placeholder="Monthly Income" class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <button type="button" wire:click="removeFamilyMember({{ $index }})" class="px-2 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 mt-2 md:mt-0">Remove</button>
            </div>
            @endforeach
        </div>

        {{-- Emergency Contacts --}}
        <div class="space-y-4">
            <h3 class="text-xl font-semibold border-b border-gray-300 dark:border-neutral-600 pb-2 text-gray-700 dark:text-gray-200 flex justify-between items-center">
                Emergency Contacts
                <button type="button" wire:click="addEmergencyContact" class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">Add Contact</button>
            </h3>

            @foreach($emergencyContacts as $index => $contact)
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 bg-gray-50 dark:bg-neutral-800 p-4 rounded-lg border border-gray-200 dark:border-neutral-700">
                <input wire:model="emergencyContacts.{{ $index }}.name" type="text" placeholder="Name" required class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <input wire:model="emergencyContacts.{{ $index }}.relationship" type="text" placeholder="Relationship" required class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <input wire:model="emergencyContacts.{{ $index }}.contact_no" type="number" placeholder="Contact No" required class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <input wire:model="emergencyContacts.{{ $index }}.address" type="text" placeholder="Address" required class="border border-gray-300 dark:border-neutral-600 rounded p-2 text-xs focus:ring-1 focus:ring-blue-400">
                <button type="button" wire:click="removeEmergencyContact({{ $index }})" class="px-2 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 mt-2 md:mt-0">Remove</button>
            </div>
            @endforeach
        </div>

        <button type="submit" class="px-6 py-1 ml-240 bg-green-600 text-white text-sm font-semibold rounded hover:bg-green-700">Submit</button>
    </form>
</div>
