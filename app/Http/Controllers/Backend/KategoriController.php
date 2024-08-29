<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori_produks = KategoriProduk::all();
        return view('backend.Kategori.index', compact('kategori_produks'));
    }

    public function create()
    {
        return view('backend.Kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        KategoriProduk::create($request->all());

        return redirect()->route('kategori_produks.index')
                         ->with('success', 'Kategori Produk berhasil ditambahkan.');
    }

    public function edit(KategoriProduk $kategoriProduk)
    {
        return view('backend.Kategori.edit', compact('kategoriProduk'));
    }

    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        $kategoriProduk->update($request->all());

        return redirect()->route('kategori_produks.index')
                         ->with('success', 'Kategori Produk berhasil diperbarui.');
    }

    public function destroy(KategoriProduk $kategoriProduk)
    {
        $kategoriProduk->delete();

        return redirect()->route('kategori_produks.index')
                         ->with('success', 'Kategori Produk berhasil dihapus.');
    }
}
