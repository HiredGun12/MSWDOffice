<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Edit User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Form for edit user') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <form class="mt-4 space-y-4" wire:submit.prevent="submit">
        <flux:input 
            style="width: 300px;" 
            wire:model="name" 
            label="Name" 
            name="name" 
            type="text" 
            placeholder="Enter your name" 
            required 
        />
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        
        <flux:input 
            style="width: 300px;" 
            wire:model="email" 
            label="Email" 
            name="email" 
            type="email" 
            placeholder="Enter your email" 
            required 
        />
        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        {{-- Password --}}
        <flux:input 
            style="width: 300px;" 
            wire:model="password" 
            label="Password" 
            name="password" 
            type="password" 
            placeholder="Enter new password (optional)" 
        />
        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        {{-- Confirm Password --}}
        <flux:input 
            style="width: 300px;" 
            wire:model="confirm_password" 
            label="Confirm Password" 
            name="confirm_password" 
            type="password" 
            placeholder="Confirm your password" 
        />
        @error('confirm_password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        <flux:checkbox.group wire:model="roles" label="Roles">
            @foreach($allRoles as $roles)
                <flux:checkbox label="{{ $roles->name }}" value="{{ $roles->name }}" />
            @endforeach
        </flux:checkbox.group>
        @error('roles') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        {{-- Buttons --}}
        <div class="flex gap-2 mt-4">
            <a href="{{ route('users.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-gray-600 rounded-lg shadow-sm hover:bg-gray-700 focus:outline-none">
                Back
            </a>

            <flux:button class="w-50" variant="primary" type="submit">
                Submit
            </flux:button>
        </div>
    </form>
</div>
