<x-layouts.app :title="__('Dashboard')">
    <div class="p-4 md:p-6">
        <div class="flex flex-col space-y-6">
            
            @can('Aics')
            <!-- AICS Dashboard -->
            <div class="border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm rounded-lg">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">
                        AICS Overview
                    </h2>
                    <livewire:aics.aics-dashboard />
                </div>
            </div>
            @endcan

            @can('Pwd')
            <!-- PWD Statistics -->
            <div class="border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm rounded-lg">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                        PWD Statistics
                    </h2>
                    <livewire:pwd.pwd-dashboard />
                </div>
            </div>
            @endcan

            @can('SoloParent')
            <!-- Solo Parent Overview -->
            <div class="border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm rounded-lg">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">
                        Solo Parent Overview
                    </h2>
                    <livewire:soloparent.soloparent-dashboard />
                </div>
            </div>
            @endcan
            
            @can('SeniorCitizen')
            <!-- Senior Citizen Overview -->
            <div class="border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm rounded-lg">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">
                        Senior Citizen Overview
                    </h2>
                    <livewire:seniorcitizen.senior-dashboard />
                </div>
            </div>
            @endcan

        </div>
    </div>
</x-layouts.app>
