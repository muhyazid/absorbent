<!DOCTYPE html>
<html>

<head>
    <title>Products PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>List of Products</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Stok</th>
                <th>Size</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ public_path('images/' . $product->image) }}" alt="{{ $product->name }}">
                        @endif
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>{{ $product->size }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
