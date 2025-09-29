<!-- Top Bar -->
<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between px-6 py-4">
        <h2 class="text-2xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
        
        <div class="flex items-center space-x-4">
            <!-- Search Bar -->
            <div class="relative">
                <input type="text" 
                       placeholder="Buscar..." 
                       class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            
            <!-- Notifications -->
            <button class="p-2 text-gray-400 hover:text-gray-600 relative">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                </svg>
                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
            </button>
            
            <!-- User Menu -->
            <div class="flex items-center space-x-3">
                <div class="text-right">
                    <p class="text-sm font-medium text-gray-700">Usuario</p>
                    <p class="text-xs text-gray-500">usuario@ejemplo.com</p>
                </div>
                <div class="h-8 w-8 bg-blue-600 rounded-full flex items-center justify-center">
                    <span class="text-white text-sm font-medium">U</span>
                </div>
            </div>
        </div>
    </div>
</header>
