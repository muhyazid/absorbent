@extends('backend.layouts.index')

@section('content-header', 'Produk')

@section('content')

    <div class="container">
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Ukuran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                class="product-image"></td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->size }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Link simple pagination -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection


{{-- @extends('layouts.index')

@section('content-header', 'Produk')

@section('content')
    <div class="container">
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Ukuran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                class="product-image"></td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->size }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
