@extends('backend.layouts.index')

@section('content-header', 'Edit Kategori Produk')

@section('content')
    <div class="container">
        <form action="{{ route('kategori_produks.update', $kategoriProduk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kategori">Kategori Produk</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $kategoriProduk->kategori }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
