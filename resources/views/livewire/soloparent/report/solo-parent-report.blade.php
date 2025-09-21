<div class="bg-white dark:bg-gray-900 shadow-lg rounded-xl p-6 space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            Solo Parent Report (All Records)
        </h2>
    
    </div>

    <!-- Gender Breakdown -->
    <div>
        <h3 class="text-lg font-semibold mb-3 text-gray-700 dark:text-gray-300">Gender Breakdown</h3>
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Gender</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">Count</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">Percentage</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">Male</td>
                    <td class="px-6 py-4 text-center text-lg font-bold text-blue-600">{{ $maleCount }}</td>
                    <td class="px-6 py-4 text-center text-sm">
                        {{ $total > 0 ? number_format(($maleCount / $total) * 100, 1) : 0 }}%
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">Female</td>
                    <td class="px-6 py-4 text-center text-lg font-bold text-pink-600">{{ $femaleCount }}</td>
                    <td class="px-6 py-4 text-center text-sm">
                        {{ $total > 0 ? number_format(($femaleCount / $total) * 100, 1) : 0 }}%
                    </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800 font-semibold">
                    <td class="px-6 py-4">Total</td>
                    <td class="px-6 py-4 text-center text-lg font-bold text-green-600">{{ $total }}</td>
                    <td class="px-6 py-4 text-center">100%</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Civil Status Breakdown -->
    <div>
        <h3 class="text-lg font-semibold mb-3 text-gray-700 dark:text-gray-300">Civil Status Distribution</h3>
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Civil Status</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">Count</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($civilStatuses as $status)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">{{ $status->civil_status ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center">{{ $status->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Age Group Breakdown -->
    <div>
        <h3 class="text-lg font-semibold mb-3 text-gray-700 dark:text-gray-300">Age Group Distribution</h3>
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Age Range</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">Count</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($ageGroups as $range => $count)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">{{ $range }}</td>
                        <td class="px-6 py-4 text-center">{{ $count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
