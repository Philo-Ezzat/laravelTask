<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return response()->json($items);
    }

    public function show($id)
    {
        $item = Product::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found']);
        }
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate( [
            'name' => 'required|string|max:255',
            'availability' => 'required|string',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $item = Product::create($validatedData());
        return response()->json($item);

    }

    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found']);
        }

        $validatedData = $request->validate( [
            'name' => 'string|max:255',
            'availability' => 'string',
            'category_id' => 'integer',
            'price' => 'numeric',
        ]);

        $item->update($validatedData);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Product::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found']);
        }
        $item->delete();
        return response()->json(['message' => 'Item deleted']);
    }
}
