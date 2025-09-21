<div x-data="{ showConfirm: false }">
    <div class="text-center space-y-2">
        <flux:heading size="xl" level="1" class="text-2xl font-extrabold text-gray-900 dark:text-gray-100">
            {{ __('Edit Solo Parent') }}
        </flux:heading>
        <flux:subheading size="lg" class="text-gray-500 dark:text-gray-400">
            {{ __('Update information for this Solo Parent member') }}
        </flux:subheading>
        <flux:separator variant="subtle" class="mt-3" />
    </div>

    <div class="w-full mx-auto p-8 bg-white dark:bg-gray-900 shadow-lg space-y-10">
        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="p-4 rounded-lg bg-green-50 dark:bg-green-900/40 border border-green-200 dark:border-green-700">
                <p class="text-green-800 dark:text-green-200 font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Form -->
        <form @submit.prevent="showConfirm = true" class="space-y-8">

            <!-- Personal Information -->
            <section class="p-6 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-2">
                    Personal Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Case Number</label>
                        <input type="text" wire:model="case_number"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                        <input type="text" wire:model="full_name"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                        <input type="text" wire:model="address"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Age</label>
                        <input type="number" wire:model="age"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sex</label>
                        <select wire:model="sex"
                                class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Civil Status</label>
                        <select wire:model="civil_status"
                                class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                            <option value="">Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                </div>
            </section>

            <!-- Additional Information -->
            <section class="p-6 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-2">
                    Additional Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Occupation</label>
                        <input type="text" wire:model="occupation"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Religion</label>
                        <input type="text" wire:model="religion"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Educational Attainment</label>
                        <input type="text" wire:model="educational_attainment"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company/Agency</label>
                        <input type="text" wire:model="company_agency"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact Number</label>
                        <input type="text" wire:model="contact_no"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                        <input type="email" wire:model="email_address"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                </div>
            </section>

            <!-- Birth Information -->
            <section class="p-6 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-2">
                    Birth Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Birth Place</label>
                        <input type="text" wire:model="birth_place"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date of Birth</label>
                        <input type="date" wire:model="date_of_birth"
                               class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700">
                    </div>
                </div>
            </section>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 text-xs text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <!-- Confirmation Modal -->
    <div x-show="showConfirm" x-cloak
         class="ml-150 fixed inset-0 flex items-center justify-centerbg-opacity-50 z-50 transition">
        <div class="bg-white dark:bg-black rounded-lg shadow-lg w-full max-w-md p-6 text-center">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Confirm Save</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Are you sure you want to save these changes?</p>
            <div class="flex justify-center gap-4">
                <!-- Cancel Button -->
                <button @click="showConfirm = false"
                        class="px-4 py-2 h-10 text-xs bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Cancel
                </button>
                <!-- Confirm Button -->
                <button @click="$wire.update(); showConfirm = false"
                        class="px-4 py-2 text-xs bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Yes, Save
                </button>
            </div>
        </div>
    </div>
</div>
