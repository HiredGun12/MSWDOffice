<div class="space-y-6">

    <!-- Header -->
    <div class="relative w-full">
        <h1 class="text-2xl font-bold">{{ __('Person with Disability') }}</h1>
        <p class="text-gray-600">{{ __('Manage all your PWD Members') }}</p>
    </div>

    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="flex items-center p-2 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Search + Filter + Add -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
        <!-- Search Box -->
        <div class="w-full md:w-1/3 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"></path>
                </svg>
            </div>
            <input
                class="w-full h-8 pl-9 pr-3 p-2 border border-gray-300 text-xs font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search..." />
        </div>

        
        <a href="{{ route('pwd.report') }}"
               class="cursor-pointer ml-50 px-6 py-2 text-xs font-medium text-white bg-green-600 rounded-lg shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Report
            </a>
        <!-- Add Button -->
        <div>
            <flux:dropdown class="w-full md:w-1/3">
            <flux:button icon:trailing="chevron-down" class="text-xs mr-10">
                {{ $sortByDisability ?: 'Types of Disabilities' }}
            </flux:button>

            <flux:menu>
                <flux:menu.radio.group
                    wire:model="sortByDisability"
                    wire:change="$set('sortByDisability', $event.target.value)"
                >
                    <flux:menu.radio value="">All</flux:menu.radio>
                    <flux:menu.radio value="Deaf/Hard of Hearing">Deaf/Hard of Hearing</flux:menu.radio>
                    <flux:menu.radio value="Intellectually Disability">Intellectually Disability</flux:menu.radio>
                    <flux:menu.radio value="Learning Disability">Learning Disability</flux:menu.radio>
                    <flux:menu.radio value="Mental Disability">Mental Disability</flux:menu.radio>
                    <flux:menu.radio value="Orthopedic/Physical Disability">Orthopedic/Physical Disability</flux:menu.radio>
                    <flux:menu.radio value="Pyschosocial Disability">Pyschosocial Disability</flux:menu.radio>
                    <flux:menu.radio value="Speach and Language Disability">Speach and Language Disability</flux:menu.radio>
                    <flux:menu.radio value="Cancer Disability">Cancer (RA11215)</flux:menu.radio>
                    <flux:menu.radio value="Rare Disease">Rare Disease (RA10747)</flux:menu.radio>
                </flux:menu.radio.group>
            </flux:menu>
        </flux:dropdown>

            <a href="{{ route('pwd.member.create') }}"
               class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Add Member
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table id="pwdTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-3">Image</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Barangay</th>
                    <th class="px-6 py-3">Birthday</th>
                    <th class="px-6 py-3">Sex</th>
                    <th class="px-6 py-3">Disability</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800" id="pwdTableBody">
                @forelse ($pwds as $pwd)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition text-sm font-medium font">
                        <td class="px-4 py-2">
                            @if ($pwd->image)
                                <img src="{{ asset('storage/' . $pwd->image) }}" class="w-9 h-9 object-cover rounded-full" alt="Profile">
                            @else
                                <span class="text-gray-400 italic">No image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 name">
                            {{ $pwd->first_name }} {{ $pwd->middle_name }} {{ $pwd->last_name }} {{ $pwd->suffix }}
                        </td>
                        <td class="px-6 py-4 barangay">{{ $pwd->barangay }}</td>
                        <td class="px-6 py-4">{{ $pwd->date_of_birth }}</td>
                        <td class="px-6 py-4">{{ $pwd->sex }}</td>
                        <td class="px-6 py-4 disability">{{ $pwd->type_of_disability }}</td>
                        <td class="px-6 py-4 flex gap-2 items-center">
                            <!-- View Info Button -->
                            <a href="{{ route('pwd.info', $pwd->id) }}"
                               class="inline-flex items-center justify-center w-7 h-5 text-black dark:text-gray-300 rounded-full hover:text-gray-700 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition"
                               aria-label="Show">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
                                          -1.274 4.057-5.064 7-9.542 7
                                          -4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center px-6 py-4 text-gray-400">
                            No results found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 text-xs">
        {{ $pwds->links() }}
    </div>
</div>
