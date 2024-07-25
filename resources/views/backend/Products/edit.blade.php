@extends('backend.layouts.index')

@section('content-header', 'Edit Product')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('backend.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" class="form-control" id="size" name="size" value="{{ $product->size }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
