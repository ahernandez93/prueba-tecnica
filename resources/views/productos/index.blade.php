<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('productos.create') }}"
                class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Crear Nuevo Producto</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto w-full mt-4 border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Nombre</th>
                            <th class="border border-gray-300 px-4 py-2">Precio</th>
                            <th class="border border-gray-300 px-4 py-2">Categorías</th>
                            <th class="border border-gray-300 px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr class="text-center">
                                <td class="border border-gray-300 px-4 py-2">{{ $producto->nombre }}</td>
                                <td class="border border-gray-300 px-4 py-2">${{ $producto->precio }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    @foreach ($producto->categorias as $categoria)
                                        <span class="bg-gray-200 px-2 py-1 rounded">{{ $categoria->nombre }}</span>
                                    @endforeach
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('productos.edit', $producto) }}"
                                        class="bg-yellow-500 text-black py-1 px-3 rounded">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white py-1 px-3 rounded" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
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