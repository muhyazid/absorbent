@extends('backend.layouts.index')

@section('content-header', 'Produk')

@section('content')

    <div class="container">
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        <a href="{{ route('products.export-pdf') }}" class="btn btn-danger mb-3">Export PDF</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
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
                        <td>{{ $product->kategori ? $product->kategori->kategori : 'Tidak ada kategori' }}</td>

                        </td>
                        <!-- Menampilkan nama kategori --> <!-- Menampilkan nama kategori -->
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                            @endif
                        </td>
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
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
