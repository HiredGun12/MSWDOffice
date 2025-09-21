<div class="text-xs">
    <h2 class="text-sm font-semibold mb-4 text-gray-800 dark:text-gray-200">Latest PWD Records</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full text-xs text-left border bg-gray-200 dark:bg-gray-900 border-gray-200 overflow-hidden">
            <thead class="bg-gray-200 text-gray-700 dark:text-gray-200  dark:bg-gray-800 uppercase">
                <tr>
                    <th class="px-3 py-1 border">Full Name</th>
                    <th class="px-3 py-1 border">Sex</th>
                    <th class="px-3 py-1 border">Disability</th>
                    <th class="px-3 py-1 border">Created At</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($pwd as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-1 border font-medium text-gray-900">
                            {{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }} {{ $item->suffix }}
                        </td>
                        <td class="px-3 py-1 border text-gray-700">{{ $item->sex }}</td>
                        <td class="px-3 py-1 border text-gray-700">{{ $item->type_of_disability }}</td>
                        <td class="px-3 py-1 border text-gray-500">
                            {{ $item->created_at?->timezone('Asia/Manila')->format('M d, Y h:i A') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-3 py-2 text-center text-gray-500">
                            No recent records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
