<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="{{ asset('frontend/images/logoaja.png') }}" type="image/x-icon">
    <title>CERRO | Absorbent Product</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">

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

            <div class="product-container">
                <div class="product-grid">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="product-item">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                        onclick="openPopup('{{ $product->id }}', '{{ $product->name }}', '{{ asset('images/' . $product->image) }}', '{{ $product->description }}', '{{ $product->kategori->kategori }}')">
                                    <h5>{{ $product->name }}</h5>
                                    <p>{{ substr($product->description, 0, 50) }}</p>
                                </div>
                            </div>
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
                                            <div id="custom-elements-{{ $product->id }}" style="display: none;">
                                                <div class="form-group">
                                                    <label
                                                        for="product-select-{{ $product->id }}"><strong>Produk:</strong></label>
                                                    <select id="product-select-{{ $product->id }}"></select>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="product-quantity-{{ $product->id }}"><strong>Jumlah:</strong></label>
                                                    <div class="input-group">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            onclick="decreaseValue({{ $product->id }})">-</button>
                                                        <input type="number" class="form-control"
                                                            id="product-quantity-{{ $product->id }}" value="0"
                                                            min="0">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            onclick="increaseValue({{ $product->id }})">+</button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary"
                                                    onclick="addProduct({{ $product->id }})">Tambah</button>
                                                <button class="btn btn-danger"
                                                    onclick="removeLastProduct({{ $product->id }})">Hapus</button>
                                                <textarea class="form-control mt-2" id="product-added-{{ $product->id }}" readonly></textarea>
                                                <button id="orderButton-{{ $product->id }}"
                                                    class="btn btn-success mt-2"
                                                    onclick="checkLoginStatus({{ $product->id }}, '{{ $product->name }}')">Pesan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- New Order Popup HTML -->
        <div id="orderPopup" class="popuporder">
            <div class="popup-contentorder">
                <span class="close" onclick="closeOrderPopup()">&times;</span>
                <form id="orderForm">
                    <div class="formorder-group">
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="formorder-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="formorder-group">
                        <label for="company">Nama Perusahaan:</label>
                        <input type="text" id="company" name="company" required>
                    </div>
                    <div class="formorder-group">
                        <label for="phone">No Tlp:</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="formorder-group">
                        <label for="address">Alamat:</label>
                        <textarea id="address" name="address" required></textarea>
                    </div>
                    <div class="formorder-group">
                        <label for="items">Barang:</label>
                        <textarea id="items" name="items" readonly></textarea>
                    </div>
                    <button type="button" onclick="submitOrderForm()">Kirim ke WhatsApp</button>
                </form>
            </div>
        </div>

        <!-- Warning Popup for Not Logged In Users -->
        <div id="warningPopup" class="popupwarning">
            <div class="popup-contentwarning">
                <span class="close" onclick="closeWarningPopup()">&times;</span>
                <p>Anda harus login terlebih dahulu untuk membuat pesanan.</p>
                <button onclick="redirectToLogin()">Login</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script src="{{ asset('frontend/js/popupproduct.js') }}"></script>
    <script src="{{ asset('frontend/js/orderPopup.js') }}"></script>
    <script src="{{ asset('frontend/js/warningPopup.js') }}"></script> <!-- New JavaScript file for warning popup -->
    @include('frontend.info')
    @include('frontend.footer')
</body>

</html>
