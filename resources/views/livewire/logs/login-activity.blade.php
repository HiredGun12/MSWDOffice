<div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow" wire:poll.10s>
    <h2 class="text-xs font-semibold text-gray-700 dark:text-gray-200 mb-3">Active Users</h2>
    <table class="w-full border-collapse border border-gray-300 text-xs">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-800">
                <th class="border px-2 py-1 font-semibold">Name</th>
                <th class="border px-2 py-1 font-semibold">Email</th>
                <th class="border px-2 py-1 font-semibold">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="border px-2 py-1">{{ $user->name }}</td>
                    <td class="border px-2 py-1">{{ $user->email }}</td>
                    <td class="border px-2 py-1">
                        @if($user->isOnline())
                            <span class="text-green-600 font-semibold">Active</span>
                        @else
                            <span class="text-red-600 font-semibold">Inactive</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
