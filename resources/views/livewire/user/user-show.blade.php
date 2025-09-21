<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Show User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Form for show user') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>       
            <div class="w-150">
                <p class="mt-2"><strong>Name :</strong>{{ $user->name }}</p>
                <p class="mt-2"><strong>Email :</strong>{{ $user->email }}</p>
            </div>
          
            <div class="flex gap-2 mt-4">
                <a href="{{ route('users.index') }}" class="w-15 cursor-pointer px-3 py-2 text-xs font-medium text-white bg-gray-600 rounded-lg shadow-sm hover:bg-gray-700 focus:outline-none">
                    Back
                </a>
            </div>
        </div>
</div>
