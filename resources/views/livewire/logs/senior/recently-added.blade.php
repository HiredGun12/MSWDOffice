<div class="p-6 bg-gray-800 dark-gray-200">
    <h2 class="text-sm font-semibold mb-4">Recently Added Senior Citizens</h2>

    <table class="w-full border-collapse border bg-gray-200 dark:bg-gray-800 border-gray-300 text-xs font-light text-gray-600 dark:text-gray-300">
        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-200 dark:text-gray-200">
            <tr>
                <th class="border px-2 py-1">Full Name</th>
                <th class="border px-2 py-1">Age</th>
                <th class="border px-2 py-1">Gender</th>
                <th class="border px-2 py-1">Birthday</th>
                <th class="border px-2 py-1">Address</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentSeniorCitizens as $senior)
                <tr>
                    <td class="border px-2 py-1">{{ $senior->full_name }}</td>
                    <td class="border px-2 py-1">{{ $senior->age }}</td>
                    <td class="border px-2 py-1">{{ $senior->gender }}</td>
                    <td class="border px-2 py-1">{{ $senior->birthday }}</td>
                    <td class="border px-2 py-1">{{ $senior->address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border px-2 py-1 text-center text-gray-500">
                        No records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
