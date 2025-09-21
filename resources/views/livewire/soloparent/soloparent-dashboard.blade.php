<div class="max-w-6xl mx-auto p-6 bg-white dark:bg-neutral-900 rounded-xl shadow-lg">
    <!-- Header -->
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">
        Dashboard
    </h2>

    <!-- Charts Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Line Chart -->
        <div class="bg-gray-50 dark:bg-neutral-800 p-4 shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3 text-center">
                Solo Parent Genders
            </h3>
            <livewire:soloparent.dashboard.soloparent-piechart />
        </div>

        <!-- Pie Chart -->
        <div class="bg-gray-50 dark:bg-neutral-800 p-4 shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3 text-center">
                Solo Parents By Barangay
            </h3>
            <livewire:soloparent.dashboard.soloparent-linechart />
        </div>

    </div>
</div>
