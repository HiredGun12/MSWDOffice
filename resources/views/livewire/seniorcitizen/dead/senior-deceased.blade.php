<div class="space-y-6">
    <!-- Header -->
    <div class="text-center md:text-left">
        <flux:heading size="xl" level="1" class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('Senior Citizen') }}
        </flux:heading>
        <flux:subheading size="lg" class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            {{ __('Senior Citizen Deceased') }}
        </flux:subheading>
        <flux:separator variant="subtle" class="mt-4" />
    </div>

    <!-- Search and Table -->
    <div class="bg-white dark:bg-neutral-900 rounded-xl shadow-md p-4">
        <!-- Search Box -->
        <div class="flex justify-between items-center mb-4">
            <div class="relative w-full md:w-1/3">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
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
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Sex</th>
                        <th class="px-6 py-3">Birthday</th>
                        <th class="px-6 py-3">Age</th>
                        <th class="px-6 py-3">Contact Person</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seniors as $senior)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $senior->name }}</td>
                        <td class="px-6 py-4">{{ $senior->sex}}</td>
                        <td class="px-6 py-4">{{ $senior->birth_date}}</td>
                        <td class="px-6 py-4">{{ $senior->age}}</td>
                        <td class="px-6 py-4">{{ $senior->contact_person}}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <!-- Retrieve -->
                            <button wire:click="retrieve({{ $senior->id }})"
                                class="px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 transition">
                                Retrieve
                            </button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
