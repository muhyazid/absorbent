@extends('backend.layouts.index')

@section('content-header', 'Product Details')

@section('content')
    <div class="container">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                @if ($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                @endif
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">{{ $product->stok }}</p>
                <p class="card-text">Size: {{ $product->size }}</p>
                <p class="card-text">Category: {{ $product->kategoriProduk->kategori }}</p> <!-- Menampilkan kategori -->
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
