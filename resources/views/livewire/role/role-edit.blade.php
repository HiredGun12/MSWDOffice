<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Edit Role') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create a new role and assign permissions') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <form class="mt-4 space-y-4" wire:submit="submit">
        {{-- Role Name Input --}}
        <flux:input style="width: 300px;" wire:model="name" label="Role Name" name="name" type="text" placeholder="Enter role name" required />
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        {{-- Permissions Checkbox Group --}}
        <flux:checkbox.group wire:model="permissions" label="Permissions">
           @foreach($allPermissions as $permission)
                <flux:checkbox label="{{ $permission->name }}" value="{{ $permission->name }}" />
            @endforeach
        </flux:checkbox.group>
        @error('permissions') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        {{-- Submit Button --}}
        <flux:button class="w-50" variant="primary" type="submit">Submit</flux:button>

        {{-- Back Button --}}
        <a href="{{ route('roles.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
            Back
        </a>
    </form>
</div>
