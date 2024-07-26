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
      
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />
      
        <!-- fonts style -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
      
        <!-- Custom styles for this template -->
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
        <!-- responsive style -->
        <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
      </head>
<body>
    @include('frontend.header')
    <p>HALAMAN PRODUK</p>








    @include('frontend.info')
    @include('frontend.footer')

    
  <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>
  <script src="{{ asset('frontend/js/script.js') }}"></script> <!-- Link ke file JavaScript -->
</body>
</html>