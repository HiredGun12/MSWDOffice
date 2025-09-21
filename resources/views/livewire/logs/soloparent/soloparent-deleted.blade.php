<div class="text-xs">

    {{-- Success Message --}}
    @if(session()->has('success'))
        <div class="mb-4 px-3 py-1 bg-green-100 text-green-800 rounded text-xs">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-sm font-semibold mb-4 text-gray-700 dark:text-gray-200">Recently Deleted Solo Parents</h2>

    <table class="w-full border-collapse border border-gray-300 text-xs font-light text-gray-600 dark:text-gray-300">
        <thead class="bg-gray-100 dark:bg-gray-800">
            <tr>
                <th class="border px-2 py-1">Case Number</th>
                <th class="border px-2 py-1">Full Name</th>
                <th class="border px-2 py-1">Age</th>
                <th class="border px-2 py-1">Sex</th>
                <th class="border px-2 py-1">Civil Status</th>
                <th class="border px-2 py-1">Deleted At</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($deletedParents as $parent)
                <tr class="hover:bg-gray-50 dark:hover:bg-neutral-600">
                    <td class="border px-2 py-1">{{ $parent->case_number }}</td>
                    <td class="border px-2 py-1">{{ $parent->full_name }}</td>
                    <td class="border px-2 py-1">{{ $parent->age }}</td>
                    <td class="border px-2 py-1">{{ $parent->sex }}</td>
                    <td class="border px-2 py-1">{{ $parent->civil_status }}</td>
                    <td class="border px-2 py-1">{{ $parent->deleted_at }}</td>
                    <td class="border px-2 py-1">
                        <button wire:click="restore({{ $parent->id }})" class="px-2 py-1 bg-green-600 text-white text-xs rounded hover:bg-green-700">
                            Restore
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="border px-2 py-1 text-center text-gray-500">No recently deleted records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
