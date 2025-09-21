<div>
    <!-- Header -->
    <div class="relative mb-6">
        <flux:heading size="xl" level="1" class="text-2xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('Senior Citizen') }}
        </flux:heading>
        <flux:subheading size="lg" class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ __('Add Senior Citizen Member') }}
        </flux:subheading>
        <flux:separator variant="subtle" class="mt-3" />
    </div>

    <!-- Flash message -->
    @if(session('success'))
        <div class="mb-4 text-green-600 text-xs bg-green-50 dark:bg-green-900/30 p-2 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form wire:submit.prevent="submit"
          class="space-y-6 bg-white dark:bg-neutral-900 p-6 shadow-md rounded-lg border border-gray-200 dark:border-neutral-700">

        <!-- Full Name & Gender -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                <input type="text" wire:model="full_name" placeholder="Enter full name"
                    class="w-full p-2 border border-gray-300 dark:border-neutral-600 rounded-md bg-white dark:bg-neutral-800 text-gray-900 dark:text-gray-100 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none transition" required>
                @error('full_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Gender</label>
                <select wire:model="gender"
                        class="w-full p-2 border border-gray-300 dark:border-neutral-600 rounded-md bg-white dark:bg-neutral-800 text-gray-900 dark:text-gray-100 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                        required>
                    <option value="">Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Age & Birthday -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Age</label>
                <input type="number" wire:model="age" id="age" placeholder="Age will auto-calculate"
                       class="w-full p-2 border border-gray-300 dark:border-neutral-600 rounded-md bg-gray-100 dark:bg-neutral-800 text-gray-900 dark:text-gray-100 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none transition" readonly>
                @error('age') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Birthday</label>
                <input type="date" wire:model="birthday" id="birthday"
                       class="w-full p-2 border border-gray-300 dark:border-neutral-600 rounded-md bg-white dark:bg-neutral-800 text-gray-900 dark:text-gray-100 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none transition" required>
                @error('birthday') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Contact Person -->
        <div>
            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Contact Person</label>
            <input type="text" wire:model="contact_person" placeholder="Enter contact person"
                   class="w-full p-2 border border-gray-300 dark:border-neutral-600 rounded-md bg-white dark:bg-neutral-800 text-gray-900 dark:text-gray-100 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none transition" required>
            @error('contact_person') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Address -->
        <div>
            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
            <textarea wire:model="address" rows="3" placeholder="Enter address"
                      class="w-full p-2 border border-gray-300 dark:border-neutral-600 rounded-md bg-white dark:bg-neutral-800 text-gray-900 dark:text-gray-100 text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none transition" required></textarea>
            @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                    class="px-4 py-1 bg-blue-600 text-white text-xs rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                Save
            </button>
        </div>
    </form>

    <!-- JavaScript to auto-calculate age and notify Livewire -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const birthdayInput = document.getElementById('birthday');
            const ageInput = document.getElementById('age');

            birthdayInput.addEventListener('change', function () {
                const birthday = new Date(this.value);
                if (!isNaN(birthday)) {
                    const today = new Date();
                    let age = today.getFullYear() - birthday.getFullYear();
                    const m = today.getMonth() - birthday.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
                        age--;
                    }
                    ageInput.value = age;

                    // Update Livewire property
                    @this.set('age', age);
                } else {
                    ageInput.value = '';
                    @this.set('age', '');
                }
            });
        });
    </script>
</div>
