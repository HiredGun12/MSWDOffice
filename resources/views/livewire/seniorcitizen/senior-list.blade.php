<div>
   <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Senior Citizen') }}</flux:heading>
        <flux:subheading size="lg text-xs" class="mb-6">{{ __('Browse all recorded Senior Citizens') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if (session()->has('success'))
        <div class="p-2 mb-4 text-sm text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
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
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search..."
                class="w-full h-9 pl-9 pr-3 border border-gray-300 rounded-md text-xs
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                       dark:border-gray-200 dark:text-gray-200 dark:focus:ring-blue-400" />
        </div>
    
        <!-- Add Member Button -->
        <a href="{{ route('senior-citizen.add') }}"
           class="px-4 py-2 text-xs text-white bg-blue-600 rounded-lg shadow-sm
                  hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
            Add Member
        </a>
    </div>

    <div class="overflow-x-auto mt-4 border border-gray-200 dark:border-gray-700">
        <table class="w-full text-xs text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">Full Name</th>
                    <th scope="col" class="gender">Gender</th>
                    <th scope="col" class="px-6 py-3">Age</th>
                    <th scope="col" class="px-6 py-3">Birthday</th>
                    <th scope="col" class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seniors as $senior)
                    <tr class="bg-white dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition h-8">
                        <td class="px-6 py-4">{{ $senior->full_name }}</td>
                        <td class="px-6 py-4">{{ $senior->gender }}</td>
                        <td class="px-6 py-4">{{ $senior->age }}</td>
                        <td class="px-6 py-4">{{ $senior->birthday }}</td>

                        <!-- Actions -->
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('senior-citizen.show', $senior->id) }}"
                               class="px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors duration-200">
                                Show
                            </a>

                            <button wire:click="confirmDelete({{ $senior->id }})"
                                    class="px-3 py-2 text-xs font-medium text-white bg-yellow-600 rounded-lg shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-colors duration-200">
                                Deceased
                            </button>
                        </td>
                    </tr>
                @endforeach

                @if($seniors->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center px-6 py-4 text-gray-400 dark:text-gray-500 italic">
                            No Senior Citizen members found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
    <div class="fixed inset-0 flex items-center justify-center bg-opacity-50 z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-sm w-full">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                Are you sure you want to delete this member?
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                This action cannot be undone.
            </p>

            <div class="flex justify-end gap-2">
                <button wire:click="$set('showDeleteModal', false)"
                        class="px-3 py-1 text-xs bg-gray-300 dark:bg-gray-600 text-gray-900 dark:text-gray-100 rounded-md hover:bg-gray-400">
                    Cancel
                </button>
                <button wire:click="delete"
                        class="px-3 py-1 text-xs bg-red-600 text-white rounded-md hover:bg-red-700">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
