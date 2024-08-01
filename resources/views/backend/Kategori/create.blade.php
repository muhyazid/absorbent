@extends('backend.layouts.index')

@section('content-header', 'Tambah Kategori Produk')

@section('content')
    <div class="container">
        <form action="{{ route('kategori_produks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kategori">Kategori Produk</label>
                <input type="text" class="form-control" id="kategori" name="kategori" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
