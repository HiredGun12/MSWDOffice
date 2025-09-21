

<div>

    <div>
        <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1" class="text-gray-900 dark:text-gray-100">
            {{ __('Solo Parent') }}
        </flux:heading>
        <flux:subheading size="lg" class="mb-6 text-gray-500 dark:text-gray-400">
            {{ __('Browse all recorded Solo Parent members') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    </div>
    <div>
         <a href="{{ route('solo-parent.edit', $soloParent->id) }}"
           {{-- route('solo-parent.edit', $soloParent->id) --}}
           class="ml-270 cursor-pointer px-5 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
            Update
        </a>
    </div>
<div>
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            Solo Parent Information
        </h2>
    </div>

    <!-- Parent Info Section -->
    <div class="bg-gray-50 dark:bg-gray-800 p-4 border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">Personal Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 dark:text-gray-300 text-sm">
            <div><strong>Case #:</strong> {{ $soloParent->case_number }}</div>
            <div><strong>Full Name:</strong> {{ $soloParent->full_name }}</div>
            <div><strong>Address:</strong> {{ $soloParent->address }}</div>
            <div><strong>Age:</strong> {{ $soloParent->age }}</div>
            <div><strong>Sex:</strong> {{ $soloParent->sex }}</div>
            <div><strong>Civil Status:</strong> {{ $soloParent->civil_status }}</div>
            <div><strong>Occupation:</strong> {{ $soloParent->occupation }}</div>
            <div><strong>Religion:</strong> {{ $soloParent->religion }}</div>
            <div><strong>Education:</strong> {{ $soloParent->educational_attainment }}</div>
            <div><strong>Company/Agency:</strong> {{ $soloParent->company_agency }}</div>
            <div><strong>Contact No:</strong> {{ $soloParent->contact_no }}</div>
            <div><strong>Email:</strong> {{ $soloParent->email_address }}</div>
            <div><strong>Birth Place:</strong> {{ $soloParent->birth_place }}</div>
            <div><strong>Date of Birth:</strong> {{ $soloParent->date_of_birth }}</div>
        </div>
    </div>

    <!-- Family Members Section -->
    <div>
        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Family Members</h3>

        @if($soloParent->familyMembers->isNotEmpty())
            <div class="overflow-x-auto border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 uppercase">
                         <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Relationship</th>
                            <th class="px-4 py-2">Age</th>
                            <th class="px-4 py-2">Birthday</th>
                            <th class="px-4 py-2">Civil Status</th>
                            <th class="px-4 py-2">Occupation</th>
                            <th class="px-4 py-2">Educational</th>
                            <th class="px-4 py-2">Monthly Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($soloParent->familyMembers as $member)
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2">{{ $member->name }}</td>
                                <td class="px-4 py-2">{{ $member->relationship }}</td>
                                <td class="px-4 py-2">{{ $member->age }}</td>
                                <td class="px-4 py-2">{{ $member->birthday }}</td>
                                <td class="px-4 py-2">{{ $member->civil_status }}</td>
                                <td class="px-4 py-2">{{ $member->occupation }}</td>
                                <td class="px-4 py-2">{{ $member->educational }}</td>
                                <td class="px-4 py-2">{{ $member->monthly }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500 dark:text-gray-400 italic">No family members recorded.</p>
        @endif
    </div>

    <!-- Emergency Contacts Section -->
    <div>
        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Emergency Contacts</h3>

        @if($soloParent->emergencyContacts->isNotEmpty())
            <div class="overflow-x-auto border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 uppercase">
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Relationship</th>
                            <th class="px-4 py-2">Contact No</th>
                            <th class="px-4 py-2">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($soloParent->emergencyContacts as $contact)
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2">{{ $contact->name }}</td>
                                <td class="px-4 py-2">{{ $contact->relationship }}</td>
                                <td class="px-4 py-2">{{ $contact->contact_no }}</td>
                                <td class="px-4 py-2">{{ $contact->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500 dark:text-gray-400 italic">No emergency contacts recorded.</p>
        @endif
    </div>
</div>
</div>