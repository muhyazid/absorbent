<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('kategori')->paginate(8);
        return view('backend.Products.index', compact('products'));
    }

    public function create()
    {
         $kategories= KategoriProduk::all();
        //$categories = KategoriProduk::all();
        
        return view('backend.Products.create', compact('kategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:kategori_produks,id', // diganti nullable bukan required
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'size' => 'required|string',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->kategori_id = $request->kategori_id; // nullable
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
        $product->load('kategori');
        return view('backend.Products.show', compact('product'));
    }

    public function edit(Product $product)
    {
         
        $kategori = KategoriProduk::all();
        return view('backend.Products.edit', compact('product', 'kategori'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:kategori_produks,id', // ini saya ganti nullable bukan required
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'size' => 'required|string',
        ]);

        $product->name = $request->name;
        $product->kategori_id = $request->kategori_id;
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

    public function exportPdf()
    {
        $products = Product::all();
        $pdf = PDF::loadView('backend.products.pdf', compact('products'));
        return $pdf->download('products.pdf');
    }
}
