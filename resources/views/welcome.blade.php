<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Tailwind</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600">Mi Proyecto</h1>
            <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Login</a>
        </div>
    </nav>

    <!-- Hero -->
    <section class="flex flex-col items-center justify-center h-[80vh] text-center px-6">
        <h2 class="text-4xl md:text-6xl font-extrabold text-gray-800 mb-6">
            Bienvenido a <span class="text-blue-600">Laravel + Tailwind</span>
        </h2>
        <p class="text-lg text-gray-600 mb-8">
            Estás viendo tu primera vista Blade con Tailwind funcionando 🎉
        </p>
        <a href="#"
           class="px-6 py-3 bg-blue-600 text-white rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
            Empezar ahora
        </a>
    </section>

</body>
</html>
