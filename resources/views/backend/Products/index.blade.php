@extends('backend.layouts.index')

@section('content-header', 'Produk')

@section('content')
    <div class="container">
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        <a href="{{ route('products.export.pdf') }}" class="btn btn-danger mb-3">Export PDF</a>
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
                                style="display:inline;" class="form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button>
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

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(
                    'Berhasil!',
                    '{{ session('success') }}',
                    'success'
                )
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('.form-delete');
                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: 'Data ini akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Tidak, batalkan'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                                'Dibatalkan',
                                'Data kamu aman :)',
                                'error'
                            )
                        }
                    })
                });
            });
        });
    </script>
@endsection
