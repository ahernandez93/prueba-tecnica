<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('productos.update', $producto->id) }}" method="POST"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre</label>
                        <input type="text" name="nombre" id="nombre"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ $producto->nombre }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $producto->descripcion }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="precio" class="block text-gray-700 font-bold mb-2">Precio</label>
                        <input type="number" name="precio" id="precio" step="0.01"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ $producto->precio }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="categorias" class="block text-gray-700 font-bold mb-2">Categorías</label>
                        <select name="categorias[]" id="categorias" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        multiple>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" 
                                {{ in_array($categoria->id, $producto->categorias->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Guardar</button>
                    <a href="{{ route('productos.index') }}" class="bg-red-600 text-white py-2 px-4 rounded">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
