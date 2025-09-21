<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Update Member') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('AICS Member') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if (session()->has('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="update" class="space-y-6">

        {{-- Row 1 --}}
        <div class="flex flex-wrap gap-x-6 gap-y-4">
            <div class="flex-1 min-w-[250px]">
                <label>First Name</label>
                <input type="text" wire:model="first_name" class="w-full border rounded px-3 py-2" />
                @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex-1 min-w-[250px]">
                <label>Middle Name</label>
                <input type="text" wire:model="middle_name" class="w-full border rounded px-3 py-2" />
                @error('middle_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex-1 min-w-[250px]">
                <label>Last Name</label>
                <input type="text" wire:model="last_name" class="w-full border rounded px-3 py-2" />
                @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Row 2 --}}
        <div class="flex flex-wrap gap-x-6 gap-y-4">
            <div class="flex-1 min-w-[250px]">
                <label>Suffix</label>
                <input type="text" wire:model="suffix" class="w-full border rounded px-3 py-2" />
            </div>

            <div class="flex-1 min-w-[250px]">
                <label>Barangay</label>
                <input type="text" wire:model="barangay" class="w-full border rounded px-3 py-2" />
                @error('barangay') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex-1 min-w-[250px]">
                <label>Department Function Code</label>
                <input type="text" wire:model="department_function_code" class="w-full border rounded px-3 py-2" />
            </div>
        </div>

        {{-- Row 3 --}}
        <div class="flex flex-wrap gap-x-6 gap-y-4">
            <div class="flex-1 min-w-[250px]">
                <label>Amount</label>
                <input type="number" step="0.01" wire:model="amount" class="w-full border rounded px-3 py-2" />
                @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex-1 min-w-[250px]">
                <label>Purpose</label>
                <input type="text" wire:model="purpose" class="w-full border rounded px-3 py-2" />
                @error('purpose') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

           <div class="flex-1 min-w-[250px]">
            <label>Assistance Date</label>
            <input 
                type="date" 
                wire:model="assistance_date" 
                class="w-full border rounded px-3 py-2" 
                max="{{ now()->toDateString() }}" 
                min="{{ now()->subYear()->toDateString() }}" 
            />
            @error('assistance_date') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        </div>

        <div class="pt-4">
            <button type="submit" class="px-5 py-2 text-xs font-medium text-white bg-green-600 rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-1 transition-all duration-150">
    Update
</button>

        </div>
    </form>
</div>
