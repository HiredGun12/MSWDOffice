<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Update Person with Disability') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Form for edit person with disability') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <a href="{{ route('products.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-gray-600 rounded-lg shadow-sm hover:bg-gray-700 focus:outline-none">
        Back
    </a>
        {{-- Buttons --}}
        <div class="flex gap-2 mt-4">
            
            <div class="w-150">
                <form wire:submit.prevent="submit" class="mt-6 space-y-4">
                    <flux:input wire:model="name" label="Name" name="name" type="text" placeholder="Enter product name" required />
                    @error('') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    <flux:textarea wire:model="details" label="Details" name="details" placeholder="Enter product details" required />
                    @error('details') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <flux:button class="w-50" variant="primary" type="submit">
                Submit
            </flux:button>


            </div>
    </div>
</div>
