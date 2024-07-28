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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  
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
          {{-- <!-- Profile Section -->
          <div class="profile-section">
              <img src="{{ asset('frontend/images/logoaja.png') }}" alt="Logo">
              <div class="profile-info">
                  <h2>CERRO Official Shop</h2>
                  <div class="profile-stats">
                      <div>Produk: 2,7RB</div>
                      <div>Pengikut: 7,5JT</div>
                      <div>Penilaian: 4.8 (4,6JT Penilaian)</div>
                      <div>Bergabung: 7 Tahun Lalu</div>
                  </div>
              </div>
              <div>
                  <button class="btn btn-primary">IKUTI</button>
                  <button class="btn btn-secondary">CHAT</button>
              </div>
          </div> --}}

          <!-- Navigation Tabs -->
          <ul class="nav nav-tabs">
              <li class="nav-item">
                  <a class="nav-link active" href="#">All Products</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Universall Absorbentk</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Oil Absorbent</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Chemical Absorbent</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Spill Kit</a>
              </li>
          </ul>

          {{-- <!-- Voucher Section -->
          <div class="voucher-section">
              <div class="voucher">
                  <h5>Diskon Rp10RB</h5>
                  <p>Min. Blj Rp0</p>
                  <button class="btn btn-primary">Klaim</button>
              </div>
              <div class="voucher">
                  <h5>Diskon Rp18RB</h5>
                  <p>Min. Blj Rp250RB</p>
                  <button class="btn btn-primary">Klaim</button>
              </div>
              <div class="voucher">
                  <h5>Diskon Rp50RB</h5>
                  <p>Min. Blj Rp500RB</p>
                  <button class="btn btn-primary">Klaim</button>
              </div>
          </div> --}}

          <div class="product-container">
              <!-- Sidebar -->
              {{-- <div class="sidebar">
                  <h4>CATEGORIES</h4>
                  <ul class="list-group">
                      <li class="list-group-item">Category 1</li>
                      <li class="list-group-item">Category 2</li>
                      <li class="list-group-item">Category 3</li>
                      <li class="list-group-item">Category 4</li>
                  </ul>
              </div> --}}

              <!-- Product Grid -->
              <div class="product-grid">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="product-item">
                              <img src="{{ asset('frontend/images/product1.jpg') }}" alt="Product 1">
                              <h5>Product 1</h5>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="product-item">
                              <img src="{{ asset('frontend/images/product2.jpg') }}" alt="Product 2">
                              <h5>Product 2</h5>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="product-item">
                              <img src="{{ asset('frontend/images/product3.jpg') }}" alt="Product 3">
                              <h5>Product 3</h5>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="product-item">
                              <img src="{{ asset('frontend/images/product4.jpg') }}" alt="Product 4">
                              <h5>Product 4</h5>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="product-item">
                            <img src="{{ asset('frontend/images/product1.jpg') }}" alt="Product 1">
                            <h5>Product 1</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <img src="{{ asset('frontend/images/product2.jpg') }}" alt="Product 2">
                            <h5>Product 2</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <img src="{{ asset('frontend/images/product3.jpg') }}" alt="Product 3">
                            <h5>Product 3</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <img src="{{ asset('frontend/images/product4.jpg') }}" alt="Product 4">
                            <h5>Product 4</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                      <div class="product-item">
                          <img src="{{ asset('frontend/images/product1.jpg') }}" alt="Product 1">
                          <h5>Product 1</h5>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="product-item">
                          <img src="{{ asset('frontend/images/product2.jpg') }}" alt="Product 2">
                          <h5>Product 2</h5>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="product-item">
                          <img src="{{ asset('frontend/images/product3.jpg') }}" alt="Product 3">
                          <h5>Product 3</h5>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="product-item">
                          <img src="{{ asset('frontend/images/product4.jpg') }}" alt="Product 4">
                          <h5>Product 4</h5>
                      </div>
                  </div>
                  </div>

                  <div class="load-more">
                      <button class="btn btn-primary">Load More</button>
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
