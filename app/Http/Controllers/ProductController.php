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
        // $products = Product::all();
        
        // Menampilkan view index dengan daftar produk
        return view('backend.Products.index', compact('products'));
    }

    public function create()
    {
        // Menampilkan view untuk membuat produk baru
        return view('backend.Products.create');
    }

    public function store(Request $request)
    {
         // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'size' => 'required|string',
        ]);

         // Membuat instance baru dari model Product
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->size = $request->size;

        // Menyimpan gambar jika ada file yang di-upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        // Menyimpan produk ke database
        $product->save();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        // Menampilkan view untuk produk tertentu
        return view('backend.Products.show', compact('product'));
    }

    public function edit(Product $product)
    {
         // Menampilkan view untuk mengedit produk tertentu
        return view('backend.Products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'size' => 'required|string',
        ]);

        // Memperbarui properti produk
        $product->name = $request->name;
        $product->description = $request->description;
        $product->size = $request->size;

        // Memperbarui gambar jika ada file yang di-upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        // Menyimpan perubahan ke database
        $product->save();

         // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Menghapus gambar jika ada
        if ($product->image) {
            unlink(public_path('images/' . $product->image));
        }

        // Menghapus produk dari database
        $product->delete();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
