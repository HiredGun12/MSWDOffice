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

    <!-- Success Message -->
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

        <a href="{{ route('solo-parent.report') }}"
           class="px-6 py-2 ml-110 text-xs text-white bg-green-600 rounded-lg shadow-sm
                  hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition">
            Report
        </a>
        <!-- Add Member Button -->
        <a href="{{ route('solo-parent.add') }}"
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
                    <th scope="col" class="px-6 py-3">Address</th>
                    <th scope="col" class="px-6 py-3">Age</th>
                    <th scope="col" class="px-6 py-3">Sex</th>
                    <th scope="col" class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($soloParents as $soloParent)
                    <tr class="bg-white dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition h-8">
                        <td class="px-6 py-4">{{ $soloParent->full_name }}</td>
                        <td class="px-6 py-4">{{ $soloParent->address }}</td>
                        <td class="px-6 py-4">{{ $soloParent->age }}</td>
                        <td class="px-6 py-4">{{ $soloParent->sex }}</td>

                        <!-- Actions -->
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('solo-parent.show', $soloParent->id) }}"
                               class="px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors duration-200">
                                Show
                            </a>

                            <button wire:click="confirmDelete({{ $soloParent->id }})"
                                    class="px-3 py-2 text-xs font-medium text-white bg-red-700 rounded-lg shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors duration-200">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach

                @if($soloParents->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center px-6 py-4 text-gray-400 dark:text-gray-500 italic">
                            No Solo Parent members found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-opacity-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    Are you sure?
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                    Do you really want to delete this Solo Parent member? This action cannot be undone.
                </p>
                <div class="flex justify-end gap-3">
                    <button wire:click="$set('showDeleteModal', false)"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </button>
                    <button wire:click="delete"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
