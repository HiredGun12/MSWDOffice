<div class="p-6 space-y-8">

    <!-- Header Section -->
    <div class="relative">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('Activity Logs') }}
        </h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            {{ __('All the recent activity logs for PWD, Solo Parents, and User Login') }}
        </p>
        <div class="border-b border-gray-200 dark:border-gray-700 mt-4"></div>
    </div>

    <!-- First Row: Full Width (User Login Activity) -->
    <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6">
        <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4">
            {{ __('User Login Activity') }}
        </h2>
        <livewire:logs.login-activity />
    </div>

    <!-- Second Row: Two Columns -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6">
            <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4">
                {{ __('PWD') }}
            </h2>
            <livewire:logs.pwd.pwd-activity />
        </div>

        <!-- Solo Parent Deleted Logs -->
        <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6">
            <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4">
                {{ __('Solo Parent') }}
            </h2>
            <livewire:logs.soloparent.soloparent-deleted />
        </div>

          <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6">
            <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4">
                {{ __('Aics') }}
            </h2>
            <livewire:logs.aics.recently-added />
        </div>

        <div class="bg-white dark:bg-gray-900 shadow rounded-lg p-6">
            <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4">
                {{ __('Senior') }}
            </h2>
            <livewire:logs.senior.recently-added />
        </div>

    </div>

</div>
