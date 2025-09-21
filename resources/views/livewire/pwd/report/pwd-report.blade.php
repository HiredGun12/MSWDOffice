<!-- Summary Table -->
<div class="mt-8 overflow-x-auto">
    <h2 class="text-lg font-bold mb-3">PWD Summary</h2>
    <table class="w-full text-sm text-left text-gray-600 border border-gray-200">
        <thead class="bg-gray-100 text-gray-700 uppercase">
            <tr>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Count</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2 font-medium">Male</td>
                <td class="px-4 py-2">{{ $genderCounts['Male'] ?? 0 }}</td>
            </tr>
            <tr>
                <td class="px-4 py-2 font-medium">Female</td>
                <td class="px-4 py-2">{{ $genderCounts['Female'] ?? 0 }}</td>
            </tr>
            <tr>
                <td class="px-4 py-2 font-medium text-green-600">Newly Registered (Today)</td>
                <td class="px-4 py-2">{{ $newlyRegistered }}</td>
            </tr>
            <tr>
                <td class="px-4 py-2 font-medium text-blue-600">Old Registered</td>
                <td class="px-4 py-2">{{ $oldRegistered }}</td>
            </tr>
            <tr class="bg-gray-50 font-semibold">
                <td class="px-4 py-2">Total PWDs</td>
                <td class="px-4 py-2">{{ $pwds->total() }}</td>
            </tr>
        </tbody>
    </table>

    <h2 class="text-lg font-bold mt-6 mb-3">PWD Count per Barangay</h2>
    <table class="w-full text-sm text-left text-gray-600 border border-gray-200">
        <thead class="bg-gray-100 text-gray-700 uppercase">
            <tr>
                <th class="px-4 py-2">Barangay</th>
                <th class="px-4 py-2">Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangayCounts as $barangay => $count)
                <tr>
                    <td class="px-4 py-2">{{ $barangay }}</td>
                    <td class="px-4 py-2">{{ $count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
