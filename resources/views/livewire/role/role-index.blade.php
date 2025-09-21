<div>
    <div class="relative mb-6 w-full">
        <h1 class="text-2xl font-bold">{{ __('Roles') }}</h1>
        <p class="text-gray-600 mb-6">{{ __('Manage all your roles.') }}</p>
        <hr class="border-t border-gray-300">
    </div>

    <div>
        @if (session()->has('success'))
            <div class="p-2 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif


        @can('role.create') 
        <a href="{{ route('roles.create') }}"
           class="inline-block px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
            Create Role
        </a>
        @endcan 
        

        <div class="overflow-x-auto mt-4">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="uppercase bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Permissions</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr class="border-s bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4">{{ $role->id }}</td>
                            <td class="px-6 py-4">{{ $role->name }}</td>
                            <td class="px-6 py-4">
                                @if ($role->permissions->isNotEmpty())
                                    @foreach ($role->permissions as $permission)
                                        <span class="inline-block bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded mr-1">
                                            {{ $permission->name }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="inline-block bg-yellow-200 text-yellow-900 text-xs px-2 py-1 rounded">
                                        Default
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @can('role.show') 
                                <a href="{{ route('roles.show', $role->id) }}"
                                   class="inline-block mb-1 px-3 py-2 text-xs text-white bg-green-700 rounded hover:bg-green-800 transition">
                                    Show
                                </a>
                                @endcan 
                                @can('role.edit') 
                                <a href="{{ route('roles.edit', $role->id) }}"
                                   class="inline-block mb-1 px-3 py-2 text-xs text-white bg-blue-700 rounded hover:bg-blue-800 transition">
                                    Edit
                                </a>
                                @endcan 
                                
                                @can('role.delete') 
                                <!-- Delete Button Triggering Modal -->
                                <flux:modal.trigger name="delete-role-{{ $role->id }}">
                                    <button 
                                        class="inline-block px-3 py-2 text-xs text-white bg-red-700 rounded hover:bg-red-800 transition">
                                        Delete
                                    </button>
                                </flux:modal.trigger> 
                            
                                <!-- Delete Confirmation Modal -->
                                <flux:modal name="delete-role-{{ $role->id }}" class="min-w-[22rem]">
                                    <div class="space-y-6">
                                        <div>
                                            <flux:heading size="lg">Delete Role?</flux:heading>
                                            <flux:text class="mt-2">
                                                <p>You're about to delete this role.</p>
                                                <p>This action cannot be undone.</p>
                                            </flux:text>
                                        </div>
                                        <div class="flex gap-2">
                                            <flux:spacer />
                                            <flux:modal.close>
                                                <flux:button variant="ghost">Cancel</flux:button>
                                            </flux:modal.close>
                                            <flux:button variant="danger" wire:click="delete({{ $role->id }})">Confirm Delete</flux:button>
                                        </div>
                                    </div>
                                </flux:modal>
                            @endcan
                            
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
