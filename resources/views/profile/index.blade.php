@extends('layouts.app')

@section('title', 'Perfil - OrgTrack')
@section('page-title', 'Mi Perfil')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Profile Header -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center space-x-6">
            <div class="h-24 w-24 bg-blue-600 rounded-full flex items-center justify-center">
                <span class="text-white text-2xl font-bold">U</span>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Usuario Ejemplo</h1>
                <p class="text-gray-600">usuario@ejemplo.com</p>
                <p class="text-sm text-gray-500">Miembro desde Enero 2024</p>
            </div>
            <div class="ml-auto">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Editar Perfil
                </button>
            </div>
        </div>
    </div>
    
    <!-- Profile Information -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Personal Information -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Información Personal</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <p class="mt-1 text-sm text-gray-900">Usuario Ejemplo</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <p class="mt-1 text-sm text-gray-900">usuario@ejemplo.com</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                    <p class="mt-1 text-sm text-gray-900">+1 (555) 123-4567</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Departamento</label>
                    <p class="mt-1 text-sm text-gray-900">Desarrollo</p>
                </div>
            </div>
        </div>
        
        <!-- Work Information -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Información Laboral</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Cargo</label>
                    <p class="mt-1 text-sm text-gray-900">Desarrollador Full Stack</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Empresa</label>
                    <p class="mt-1 text-sm text-gray-900">OrgTrack Solutions</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha de Ingreso</label>
                    <p class="mt-1 text-sm text-gray-900">15 de Enero, 2024</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Estado</label>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Activo
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Skills and Preferences -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Skills -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Habilidades</h3>
            <div class="flex flex-wrap gap-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    Laravel
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    PHP
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                    JavaScript
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                    Vue.js
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                    MySQL
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                    Tailwind CSS
                </span>
            </div>
        </div>
        
        <!-- Preferences -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Preferencias</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-700">Notificaciones por email</span>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none">
                        <input type="checkbox" name="email-notifications" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked>
                        <label for="email-notifications" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-700">Modo oscuro</span>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none">
                        <input type="checkbox" name="dark-mode" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer">
                        <label for="dark-mode" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-700">Recordatorios</span>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none">
                        <input type="checkbox" name="reminders" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked>
                        <label for="reminders" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Actividad Reciente</h3>
        <div class="space-y-4">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-900">Perfil actualizado</p>
                    <p class="text-sm text-gray-500">Hace 1 día</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <div class="h-8 w-8 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-900">Contraseña cambiada</p>
                    <p class="text-sm text-gray-500">Hace 3 días</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <div class="h-8 w-8 bg-yellow-100 rounded-full flex items-center justify-center">
                        <svg class="h-4 w-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-900">Nuevo proyecto asignado</p>
                    <p class="text-sm text-gray-500">Hace 1 semana</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.toggle-checkbox:checked {
    right: 0;
    border-color: #3B82F6;
}
.toggle-checkbox:checked + .toggle-label {
    background-color: #3B82F6;
}
</style>
@endsection
