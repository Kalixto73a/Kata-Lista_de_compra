<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function index()
    {
        $lists = Lista::all();

        return response()->json($lists, 200);       
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string'
        ]);

        $product = Lista::create([
            'product_name' => $validated['product_name']    
        ]);

        $this->checkIfProductExist($request);

        $product->save();

        return response()->json($product, 201);
    }

    public function update(Request $request, string $id)
    {
        $product = Lista::find($id);

        if (!$product) {
            return response()->json(['message'=>'Producto no encontrado'], 404);
        }
        
        $validated = $request->validate([
            'product_name' => 'required|string'
        ]);
        
        $product_name = $validated['product_name'] ?? $product->product_name;

        $product->update([
            'product_name' => $product_name
        ]);

        $product->save();

        return response()->json($product, 200);
    }

    public function destroy(string $id)
    {
        $product = Lista::find($id);
        
        if (!$product) {
            return response()->json(['message'=>'Producto no encontrado'], 404);
        }

        $product->delete();

        return response()->json(['message'=>'Producto eliminado exitosamente'], 200);
    }

    public function destroyAll()
    {
        $product = Lista::all();
        
        if (!$product) {
            return response()->json(['message'=>'No hay productos'], 404);
        }

        $product->delete();

        return response()->json(['message'=>'Todos los productos a sido eliminados de forma exitosa'], 200);
    }

    private function checkIfProductExist(Request $request)
    {
        $products = Lista::all();

        $product_name = $products->where('product_name', $request->product_name)->first();

        if ($product_name) {
            return response()->json(['message'=>'Esta producto ya esta en la lista'], 400);
        }
    }
}
