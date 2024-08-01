<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class ProductFrontendController extends Controller
{
    // Fungsi untuk menampilkan semua produk dan kategori
    public function index()
    {
        // Ambil semua kategori
        $categories = KategoriProduk::all();
        // Ambil semua produk
        $products = Product::all();
        // Kirim data ke view frontend.product
        return view('frontend.product', compact('categories', 'products'));
    }

    // Fungsi untuk menampilkan produk berdasarkan kategori
    public function category($id)
    {
        // Ambil semua kategori
        $categories = KategoriProduk::all();
        // Ambil produk berdasarkan kategori_id
        $products = Product::where('kategori_id', $id)->get();
        // Kirim data ke view frontend.product
        return view('frontend.product', compact('categories', 'products'));
    }

    // Fungsi untuk mendapatkan produk berdasarkan kategori dalam format JSON
    // public function getProductsByCategory($id)
    // {
    //     $products = Product::where('kategori_id', $id)->get();
    //     // Ambil semua produk untuk combo box
    //     // $products = Product::all();
    //     return response()->json($products);
    // }

    // method untuk mengambil produk khusus untuk custom spill kit.
    public function getCustomSpillKitProducts()
    {
        //$products = Product::getCustomSpillKitProducts();
         $products = Product::where('kategori_id', 8)->get(); // Ambil produk dengan kategori ID 8
        return response()->json($products);
    }

    public function getAllProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function show($id)
{
    $product = Product::with('kategori')->find($id);
    return view('product.show', compact('product'));
}


}
