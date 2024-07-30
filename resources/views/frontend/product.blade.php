<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('frontend/images/logoaja.png') }}" type="image/x-icon">

    <title>CERRO | Absorbent Product</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />

    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">

</head>

<body>
    @include('frontend.header')

    <div class="content-container">
        <div class="container">
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products') ? 'active' : '' }}"
                        href="{{ route('frontend.products.index') }}">All Products</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products/category/' . $category->id) ? 'active' : '' }}"
                            href="{{ route('frontend.products.category', $category->id) }}">{{ $category->kategori }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="product-container">
                <div class="product-grid">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="product-item">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                    <h5>{{ $product->name }}</h5>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.info')
        @include('frontend.footer')
    </div>
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script> <!-- Link ke file JavaScript -->
</body>

</html>
