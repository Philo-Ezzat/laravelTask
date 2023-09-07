<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('productsDetails', ['product' => $product]);
    }
     
    public function destroy($id)
    {
            $product = Product::find($id);

            if ($product->image) {
                $imagePath = public_path('Images') . '/' . $product->image;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            $product->delete();
            return redirect()->route('products');
    }
  
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'availability' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        if ($request->hasFile('image')) {
                $imagePath = public_path('Images') . '/' . $product->image;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('Images'), $imageName);
    
            $validatedData['image'] = $imageName;
        }
    
        $product->update($validatedData);
    
        return redirect()->route('products');
    }
    
    public function edit($id)
    {
        $product = Product::find($id);
        return view('productsUpdate', ['product' => $product]);
    }
    
    function create()
    {
        return view('productsInsert');

    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('Images'), $imageName);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'availability' => $request->availability,
            'image' => $imageName,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products');
    }
}

