<div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6 text-xs">
    <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4">
        Latest Added AICS Records
    </h2>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 text-xs">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="border px-3 py-2 text-left">Full Name</th>
                    <th class="border px-3 py-2 text-left">Barangay</th>
                    <th class="border px-3 py-2 text-left">Amount</th>
                    <th class="border px-3 py-2 text-left">Purpose</th>
                    <th class="border px-3 py-2 text-left">Assistance Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestAICS as $index => $aics)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="border px-3 py-2">
                            {{ $aics->first_name }} {{ $aics->middle_name }} {{ $aics->last_name }} {{ $aics->suffix }}
                        </td>
                        <td class="border px-3 py-2">{{ $aics->barangay }}</td>
                        <td class="border px-3 py-2">{{ number_format($aics->amount, 2) }}</td>
                        <td class="border px-3 py-2">{{ $aics->purpose }}</td>
                        <td class="border px-3 py-2">{{ $aics->assistance_date->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border px-3 py-2 text-center text-gray-500">
                            No records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
