@extends('backend.layouts.index')

@section('content-header', 'Kategori Produk')

@section('content')
    <div class="container">
        <a href="{{ route('kategori_produks.create') }}" class="btn btn-primary mb-3">Tambah Kategori Produk</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori_produks as $index => $kategori_produk)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kategori_produk->kategori }}</td>
                        <td>
                            <a href="{{ route('kategori_produks.edit', $kategori_produk->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kategori_produks.destroy', $kategori_produk->id) }}" method="POST"
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
