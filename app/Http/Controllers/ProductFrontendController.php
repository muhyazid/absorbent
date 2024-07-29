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
}
