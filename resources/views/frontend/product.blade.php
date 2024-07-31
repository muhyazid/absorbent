<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata dasar untuk halaman web -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/logoaja.png') }}" type="image/x-icon">

    <!-- Judul halaman -->
    <title>CERRO | Absorbent Product</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />

    <!-- Fonts style dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />

    <!-- Custom styles untuk template -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <!-- Custom styles untuk halaman produk -->
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">

</head>

<body>
    <!-- Menyertakan header -->
    @include('frontend.header')

    <div class="content-container">
        <div class="container">
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs">
                <!-- Tab untuk semua produk -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('frontend/products') ? 'active' : '' }}"
                        href="{{ route('frontend.products.index') }}">All Products</a>
                </li>
                <!-- Looping untuk membuat tab navigasi berdasarkan kategori -->
                @foreach ($categories as $category)
                    <li class="nav-item">
                        {{-- ini juga untuk memastikan produk tanpa kategori hanya muncul di tab "All Products" dengan menggunakan kondisi di dalam looping produk --}}
                        <a class="nav-link {{ request()->is('frontend/products/category/' . $category->id) ? 'active' : '' }}"
                            href="{{ route('frontend.products.category', $category->id) }}">{{ $category->kategori }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="product-container">
                <div class="product-grid">
                    <div class="row">
                        <!-- Looping untuk menampilkan setiap produk dalam bentuk card -->
                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="product-item">
                                    <!-- Menampilkan gambar produk -->
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                                    <!-- Menampilkan nama produk -->
                                    <h5>{{ $product->name }}</h5>
                                    <!-- Menampilkan deskripsi produk -->
                                    <p>{{ $product->description }}</p>
                                    <!-- Link untuk membuka pop-up -->
                                    <a href="javascript:void(0);"
                                        onclick="openPopup('{{ $product->id }}', '{{ $product->name }}', '{{ asset('images/' . $product->image) }}', '{{ $product->description }}')">Read
                                        More</a>
                                </div>
                            </div>
                            <!-- Pop-up untuk setiap produk -->
                            <div id="popup-{{ $product->id }}" class="popup">
                                <div class="popup-content">
                                    <div class="popup-body">
                                        <span class="close"
                                            onclick="closePopup('popup-{{ $product->id }}')">&times;</span>
                                        <div class="left-column">
                                            <img src="" alt="" id="popup-image-{{ $product->id }}">
                                            <h2 class="judul-popup" id="popup-title-{{ $product->id }}"></h2>
                                        </div>
                                        <div class="right-column text-container">
                                            <p class="key-feature"><strong>Description:</strong></p>
                                            <p class="tulisan-popup" id="popup-description-{{ $product->id }}"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Menyertakan info dan footer -->
        @include('frontend.info')
        @include('frontend.footer')
    </div>

    <!-- Script JavaScript -->
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script> <!-- Link ke file JavaScript -->

    <script>
        function openPopup(id, name, image, description) {
            var popup = document.getElementById('popup-' + id);
            document.getElementById('popup-title-' + id).innerText = name;
            document.getElementById('popup-image-' + id).src = image;
            document.getElementById('popup-image-' + id).alt = name;
            document.getElementById('popup-description-' + id).innerText = description;
            popup.style.display = "flex";
        }

        window.onclick = function(event) {
            var popups = document.getElementsByClassName('popup');
            for (var i = 0; i < popups.length; i++) {
                if (event.target == popups[i]) {
                    popups[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>
