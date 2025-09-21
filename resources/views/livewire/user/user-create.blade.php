<div>
    <div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create for new user') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    
    

    <form class="mt-4 space-y-4" wire:submit.prevent="submit">
        <flux:input style="width: 300px;" wire:model="name" label="Name" name="name" type="text" placeholder="Enter your name" required />
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    
        <flux:input style="width: 300px;" wire:model="email" label="Email" name="email" type="text" placeholder="Enter your email" required />
        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    
        <flux:input style="width: 300px;" wire:model="password" label="Password" name="password" type="password" placeholder="Enter your password" required />
        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    
        <flux:input style="width: 300px;" wire:model="confirm_password" label="Confirm Password" name="confirm_password" type="password" placeholder="Confirm your password" required />

        <flux:checkbox.group wire:model="roles" label="Roles">
            @foreach($allRoles as $roles)
                <flux:checkbox label="{{ $roles->name }}" value="{{ $roles->name }}" />
            @endforeach
        </flux:checkbox.group>
        @error('roles') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    

        <a href="{{ route('users.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
            Back
        </a>

        <flux:button  class="w-50" variant="primary" type="submit">Submit</flux:button>

       

    </form>
    

</div>
</div>
