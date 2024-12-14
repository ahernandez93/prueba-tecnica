<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('categorias.create') }}"
                class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Crear Nueva Categoría</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto w-full mt-4 border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Nombre</th>
                            <th class="border border-gray-300 px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr class="text-center">
                                <td class="border border-gray-300 px-4 py-2">{{ $categoria->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $categoria->nombre }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                                        class="bg-yellow-500 text-black py-1 px-3 rounded">Editar</a>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded"
                                            onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>