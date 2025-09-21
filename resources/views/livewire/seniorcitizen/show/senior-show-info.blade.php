<div class="space-y-6">
    <!-- Header -->
    <div class="relative">
        <flux:heading size="xl" level="1" class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('Senior Citizen') }}
        </flux:heading>
        <flux:subheading size="lg" class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            {{ __('Senior Citizen Information') }}
        </flux:subheading>
        <flux:separator variant="subtle" class="mt-4" />
    </div>

    <!-- Action Button -->
    <div class="flex justify-end">
        <a href="{{ route('senior-citizen.update', $seniors->id) }}"
           class="px-4 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Update
        </a>
    </div>

    <!-- Information Card -->
    <div class="p-6 bg-white dark:bg-neutral-900 shadow rounded-lg border border-gray-200 dark:border-neutral-700">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-300">
            <p><strong class="font-medium text-gray-900 dark:text-gray-100">Full Name:</strong> {{ $seniors->full_name }}</p>
            <p><strong class="font-medium text-gray-900 dark:text-gray-100">Age:</strong> {{ $seniors->age }}</p>
            <p><strong class="font-medium text-gray-900 dark:text-gray-100">Gender:</strong> {{ $seniors->gender }}</p>
            <p><strong class="font-medium text-gray-900 dark:text-gray-100">Birthday:</strong> {{ $seniors->birthday }}</p>
            <p><strong class="font-medium text-gray-900 dark:text-gray-100">Contact Person:</strong> {{ $seniors->contact_person }}</p>
            <p class="md:col-span-2"><strong class="font-medium text-gray-900 dark:text-gray-100">Address:</strong> {{ $seniors->address }}</p>
        </div>
    </div>
</div>
