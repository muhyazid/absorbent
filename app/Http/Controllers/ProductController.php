<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        // Mengambil produk dengan pagination, 8 produk per halaman
        $products = Product::paginate(8);

        //$products = Product::all();
        return view('backend.Products.index', compact('products'));
    }

    public function create()
    {
        return view('backend.Products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'size' => 'required|string',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->size = $request->size;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('backend.Products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('backend.Products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'size' => 'required|string',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->size = $request->size;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            unlink(public_path('images/' . $product->image));
        }

        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
