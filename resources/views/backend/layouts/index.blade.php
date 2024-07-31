<!-- resources/views/layouts/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mengatur karakter encoding ke UTF-8 -->
    <meta charset="utf-8">
    <!-- Mengatur viewport agar responsif terhadap ukuran layar perangkat -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Menambahkan CSRF token untuk keamanan -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Judul halaman -->
    <title>SRA | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    {{-- tambahan sakti --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    {{-- end of tambhaan sakti --}}
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <!-- Logo animasi saat preloader -->
            <img class="animation__shake" src="{{ asset('dist/img/CERRO NEW COLOR - Copy.png') }}" alt="SRA-Logo"
                height="100" width="100">
        </div>

        <!-- Menyertakan file partial navbar -->
        @include('backend.partials.navbar')
        <!-- Menyertakan file partial sidebar -->
        @include('backend.partials.sidebar')

        <!-- Content Wrapper. Menampung konten halaman -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @hasSection('content-header')
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <!-- Judul halaman yang diisi dari bagian 'content-header' -->
                                <h1 class="m-0">@yield('content-header')</h1>
                            </div>
                            <div class="col-sm-6">
                                <!-- Breadcrumb navigasi -->
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('backend.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">@yield('content-header')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Konten utama halaman akan ditempatkan di sini -->
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="https://adminlte.io">PT Sumber Rejeki Agung</a>.</strong>
            All rights reserved.
            {{-- <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div> --}}
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    {{-- tambahan sakti --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    @if (session('success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if (session('login_success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Welcome!',
                    text: "{{ session('login_success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
    {{-- end of tambahan sakti --}}
</body>

</html>
