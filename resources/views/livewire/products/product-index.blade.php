<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Products') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage all your products') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div>
        @session('success')
            <div class="flex items-center p-2 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400">
                <svg class="flex-shrink-0 w-5 h-5 me-2 rtl:ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 9.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"/>
                </svg>
                <span class="font-medium">{{ $value }}</span>
            </div>
        @endsession 

        <a href="{{ route('products.create') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
            Create product
        </a>

        <div class="overflow-x-auto mt-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Details</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $product->id }}</td>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->details }}</td>
                        
                        <td class="px-6 py-4">

                            <a href="{{ route('products.show', $product->id) }}" class="mr-1 cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors duration-200">
                                Show
                                    </a>

                            <a href="{{ route('products.edit', $product->id) }}" class="mr-1 cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                                Edit
                                    </a>

                            <button wire:click="delete({{ $product->id }})" wire:confirm="Are you sure you want to delete this product?" class=" mr-1 cursor-pointer px-3 py-2 text-xs font-medium text-white bg-red-700 rounded-lg shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                                Delete
                                    </button>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
