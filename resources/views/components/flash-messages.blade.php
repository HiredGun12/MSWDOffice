@session('success')

<div 
            id="toast" 
            x-data="{ show: true }" 
            x-show="show" 
            class="fixed bottom-4 right-4 z-50 flex items-center justify-between w-80 p-4 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700"
            x-transition
        >
            <div class="bg-green-500 p-1 rounded-full mr-3">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            </div>
            <span>Profile updated successfully.</span>
            <button 
            @click="show = false" 
            class="ml-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none"
            aria-label="Close"
            >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            </button>
        </div>
@endsession