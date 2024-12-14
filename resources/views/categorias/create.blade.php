<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Categoría') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('categorias.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre de la Categoría:</label>
                        <input type="text" name="nombre" id="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Guardar</button>
                    <a href="{{ route('categorias.index') }}" class="bg-blue-600 text-white py-2 px-4 rounded">Volver al listado</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>