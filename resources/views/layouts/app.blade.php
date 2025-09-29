<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OrgTrack')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar Component -->
        @include('components.sidebar')
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header Component -->
            @include('components.header')
            
            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
