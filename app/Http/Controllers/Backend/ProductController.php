<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ProductController extends Controller
{
    // Menampilkan daftar produk dengan paginasi (8 produk per halaman)
    public function index()
    {
        $products = Product::with('kategori')->paginate(8);
        return view('backend.Products.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $kategories = KategoriProduk::all(); // Mendapatkan semua kategori produk
        return view('backend.Products.create', compact('kategories'));
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:kategori_produks,id', // nullable, tidak wajib diisi
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:10048', // nullable, tidak wajib diisi
            'description' => 'required|string',
            'stok'=> 'required|integer',
            'size' => 'required|integer',
        ]);

        // Membuat instance baru dari model Product
        $product = new Product;
        $product->name = $request->name;
        $product->kategori_id = $request->kategori_id; // nullable, bisa kosong
        $product->description = $request->description;
        $product->stok = $request->stok;
        $product->size = $request->size;

        // Jika ada file gambar yang diupload, simpan ke folder public/images
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        // Menyimpan produk ke database
        $product->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    // Menampilkan detail produk berdasarkan ID
    public function show(Product $product)
    {
        $product->load('kategori'); // Memuat relasi kategori
        return view('backend.Products.show', compact('product'));
    }

    // Menampilkan form untuk mengedit produk yang sudah ada
    public function edit(Product $product)
    {
        $kategori = KategoriProduk::all(); // Mendapatkan semua kategori produk
        return view('backend.Products.edit', compact('product', 'kategori'));
    }

    // Memperbarui produk yang sudah ada di database
    public function update(Request $request, Product $product)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:kategori_produks,id', // nullable, tidak wajib diisi
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:10048', // nullable, tidak wajib diisi
            'description' => 'required|string',
            'stok'=> 'required|integer',
            'size' => 'required|integer',
        ]);

        // Memperbarui data produk
        $product->name = $request->name;
        $product->kategori_id = $request->kategori_id; // nullable, bisa kosong
        $product->description = $request->description;
        $product->stok = $request->stok;
        $product->size = $request->size;

        // Jika ada file gambar yang diupload, simpan ke folder public/images
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        // Menyimpan perubahan ke database
        $product->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    // Menghapus produk dari database
    public function destroy(Product $product)
    {
        // Jika produk memiliki gambar, hapus file gambar dari folder public/images
        if ($product->image) {
            unlink(public_path('images/' . $product->image));
        }

        // Menghapus produk dari database
        $product->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }

    // Mengekspor daftar produk ke file PDF
    public function exportPDF()
    {
        $products = Product::all(); // Mendapatkan semua produk
        $pdf = PDF::loadView('backend.products.pdf', compact('products')); // Membuat PDF dari view
        return $pdf->download('products.pdf'); // Mendownload file PDF
    }
}
