<div>
    <div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create product') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create for new product') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div class="flex items-center justify-between mb-7">
    <a href="{{ route('products.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
        Back
    </a>
</div>
    

    <form class="mt-4 space-y-4" wire:submit.prevent="submit">
        <flux:input style="width: 300px;" wire:model="name" label="Name" name="name" type="text" placeholder="Enter your name" required />
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    
        <flux:textarea wire:model="details" label="Details" name="details" placeholder="Enter product details" required />
        @error('details') <span class="text-red-500 text-xs">{{ $message}}</span> @enderror
    
        <flux:button  class="w-50" variant="primary" type="submit">Submit</flux:button>

    </form>
    

</div>
</div>
