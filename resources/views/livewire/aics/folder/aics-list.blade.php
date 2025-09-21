<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('List of AICS') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Browse all recorded AICS members') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if (session('success'))
        <div class="flex items-center p-2 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400">
            <svg class="flex-shrink-0 w-5 h-5 me-2 rtl:ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 9.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"/>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
        <div class="w-full md:w-1/3 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"></path>
                </svg>
            </div>
            <input
                class="w-full h-8 pl-9 pr-3 p-2 border border-gray-300 text-sm font-small rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search..." />
        </div>

       


        <div>
            <a href="{{ route('aics.monthly.list') }}" class="px-3 py-2 text-xs font-medium text-white bg-yellow-500 rounded-lg shadow-sm hover:bg-yellow-600 focus:outline-none">
                Monthly Report
            </a>
        </div>

        <div>
            <a href="{{ route('aics.member.create') }}" class="px-3 py-2 text-xs font-medium text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none">
                Add Member
            </a>
        </div>
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Barangay</th>
                    <th scope="col" class="px-6 py-3">Purpose</th>
                    <th scope="col" class="px-6 py-3">Department/Function Code</th>
                    <th scope="col" class="px-6 py-3">Date Released</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($person as $persons)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $persons->first_name }} {{ $persons->middle_name }} {{ $persons->last_name }} {{ $persons->suffix }}</td>
                    <td class="px-6 py-4">{{ $persons->barangay }}</td>
                    <td class="px-6 py-4">{{ $persons->purpose }}</td>
                    <td class="px-6 py-4">{{ $persons->department_function_code }}</td>
                    
                    <td class="px-6 py-4">{{ $persons->assistance_date->format('M j, Y') }}</td>
                    <td class="px-6 py-4 flex gap-1">
                        <a href="{{route('aics.update', $persons->id)}}" class="px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800">Update</a>
                        <button wire:click="confirmDelete({{ $persons->id }})" 
                                class="px-3 py-2 text-xs font-medium text-white bg-red-700 rounded-lg hover:bg-red-800">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-opacity-0">
        <div class="bg-gray-200 dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                Are you sure you want to delete this person?
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                This action cannot be undone.
            </p>

            <div class="flex justify-end gap-3">
                <button wire:click="$set('showDeleteModal', false)"
                        class="px-4 py-2 bg-gray-300 text-xs dark:bg-gray-600 text-gray-900 dark:text-gray-100 rounded-md hover:bg-gray-400">
                    Cancel
                </button>
                <button wire:click="delete"
                        class="px-4 py-2 text-xs bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Yes, Delete
                </button>

            </div>
        </div>
    </div>
    @endif
</div>
