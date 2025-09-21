<div>
    <!-- 🔍 Search Box -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
        <div class="w-full md:w-1/3 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- Search Icon -->
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"></path>
                </svg>
            </div>
            <input
                class="w-full h-8 pl-9 pr-3 p-2 border border-gray-300 text-xs font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600"
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search..." />
        </div>
    </div>

    @forelse ($groupedMembers as $day => $barangays)
        @php
            $createdDate = \Carbon\Carbon::parse($day);
            $isThreeMonthsOld = $createdDate->lte(\Carbon\Carbon::now()->subMonths(3));
            $withinTenDays = $createdDate->gte(\Carbon\Carbon::now()->subDays(10));
        @endphp

        <div 
            x-data="{ open: false, animate: {{ $isThreeMonthsOld && $withinTenDays ? 'true' : 'false' }} }"
            x-init="if (animate) { 
                        $el.classList.add('animate-bounce-up'); 
                        setTimeout(() => { $el.classList.remove('animate-bounce-up'); }, 10000);
                    }"
            class="border border-gray-200 rounded-lg shadow-sm bg-white overflow-hidden hover:shadow-md transition mb-3"
        >
            <!-- Day Header -->
            <div 
                class="flex items-center justify-between px-4 py-3 bg-gradient-to-r from-blue-100 to-blue-50 cursor-pointer hover:from-blue-200 hover:to-blue-100 transition"
                @click="open = !open"
            >
                <div class="flex items-center gap-2">
                    <!-- Folder Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 text-blue-600" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor" 
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v7a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                    </svg>
                    <span class="text-sm sm:text-base font-semibold text-blue-800">
                        {{ \Carbon\Carbon::parse($day)->format('F d, Y') }}
                    </span>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Export Button -->
                    <button 
                        wire:click.stop="export('{{ $day }}')" 
                        class="px-3 py-1 text-xs sm:text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 transition"
                    >
                        Export
                    </button>

                    <!-- Chevron Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-4 h-4 text-gray-500 transform transition-transform duration-200"
                         :class="open ? 'rotate-90' : ''" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor" 
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>

            <!-- Table of Members for this Day -->
            <div 
                x-show="open" 
                x-transition 
                class="px-4 py-3 bg-gray-50 border-t border-gray-200"
            >
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 text-xs sm:text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-2 py-1 text-left">Name</th>
                                <th class="border px-2 py-1 text-left">Barangay</th>
                                <th class="border px-2 py-1 text-left">Purpose</th>
                                <th class="border px-2 py-1 text-left">Amount</th>
                                <th class="border px-2 py-1 text-left">Date Released</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangays as $barangay => $members)
                                @foreach ($members as $member)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border px-2 py-1">
                                            {{ $member->last_name }}, {{ $member->first_name }} {{ $member->middle_name }} {{ $member->suffix }}
                                        </td>
                                        <td class="border px-2 py-1">{{ $member->barangay }}</td>
                                        <td class="border px-2 py-1">{{ $member->purpose }}</td>
                                        <td class="border px-2 py-1">{{ $member->amount }}</td>
                                        <td class="border px-2 py-1">
                                            {{ $member->assistance_date ? \Carbon\Carbon::parse($member->assistance_date)->format('M d, Y') : 'N/A' }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <p class="text-gray-500 text-sm text-center">No records available.</p>
    @endforelse

    <!-- CSS Animation inside same root -->
    <style>
    @keyframes bounceUp {
      0%   { transform: translateY(0); }
      25%  { transform: translateY(-20px); }
      50%  { transform: translateY(-40px); }
      75%  { transform: translateY(-20px); }
      100% { transform: translateY(0); }
    }
    .animate-bounce-up {
      animation: bounceUp 2s ease-in-out infinite;
    }
    </style>
</div>
