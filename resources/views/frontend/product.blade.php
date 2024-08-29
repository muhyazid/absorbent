<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/logoaja.png') }}" type="image/x-icon">
    <title>CERRO | Absorbent Product</title>

    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/orderPopup.css') }}">
</head>

<body>
    @include('frontend.header')

    <!-- Add user data and login status -->
    <script>
        const user = @json(auth()->user());
        const isLoggedIn = @json(auth()->check());
    </script>

    <div class="content-container">
        <div class="container">
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('frontend/products') ? 'active' : '' }}"
                        href="{{ route('frontend.products.index') }}">All Products</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('frontend/products/category/' . $category->id) ? 'active' : '' }}"
                            href="{{ route('frontend.products.category', $category->id) }}">{{ $category->kategori }}</a>
                    </li>
                @endforeach
            </ul>

            <!-- Product Grid -->
            <div class="product-container">
                <div class="product-grid">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="product-item">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                        onclick="openPopup('{{ $product->id }}', '{{ $product->name }}', '{{ asset('images/' . $product->image) }}', `{{ $product->description }}`, '{{ $product->kategori->kategori }}')">
                                    <h5>{{ $product->name }}</h5>
                                    <p>{{ substr($product->description, 0, 50) }}</p>
                                </div>
                            </div>
                            <!-- Include popup template -->
                            @include('frontend.popup')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS files -->
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script src="{{ asset('frontend/js/popupproduct.js') }}"></script>
    <script src="{{ asset('frontend/js/orderPopup.js') }}"></script>
    <script src="{{ asset('frontend/js/warningPopup.js') }}"></script>

    @include('frontend.info')
    @include('frontend.footer')
</body>

</html>
