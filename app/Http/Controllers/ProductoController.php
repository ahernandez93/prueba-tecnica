<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categorias')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'categorias' => 'array',
        ]);

        $producto = Producto::create($data);
        $producto->categorias()->sync($data['categorias'] ?? []);

        return redirect()->route('productos.index');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id); // Encuentra el producto por ID o lanza un error 404
        $categorias = Categoria::all(); // Opcional: si necesitas mostrar categorías en un select
        return view('productos.edit', compact('producto', 'categorias'));
    }


    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'categorias' => 'array',
        ]);

        $producto->update($data);
        $producto->categorias()->sync($data['categorias'] ?? []);

        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}

