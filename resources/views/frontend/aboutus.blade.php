<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="about us, company" />
    <meta name="description" content="Learn more about our company, our mission, and our values." />
    <meta name="author" content="Cerro" />
    <link rel="shortcut icon" href="{{ asset('frontend/images/logoaja.png') }}" type="image/x-icon">
  
    <title>CERRO | About Us</title>
  
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />
  
    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/aboutus.css') }}" rel="stylesheet" />
    <style>
        .about_us_section .detail-box {
            margin-top: 50px; /* Adjust this value as needed */
        }
    </style>
</head>
<body>
    @include('frontend.header')

    <!-- About Us Section -->
    <section class="about_us_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>About Us</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="About Us Image" height="50%" width="50%">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <h3>PT. Sumber Rejeki Agung | Absorbent</h3>
                        <h4>Safetoe Top Quality Sejak 1984</h4>
                        <p>PT. Sumber Rejeki Agung yang bergerak di bidang penyediaan peralatan keselamatan dan keamanan. Kantor pusat berlokasi di Kompleks Ruko Rungkut Megah Raya Blok A No. 15 Jalan Raya Kali Rungkut Surabaya dan cabangnya di Jakarta, beralamat di Lindeteves Trade Center (LTC), Lt. Gf 1 Blok C2 No. 5 Jalan Hayam Wuruk 127 Jakarta Barat.</p>
                        <p>Produk yang kami sediakan antara lain Sepatu Safety, Safety Equipment, Safety Signs, Cutting Stiker dan General Trading. Kami juga merupakan importir produk sepatu safety merk Safetoe, serta perlengkapan safety merk Cerro.</p>
                        <p><i>(Karena banyaknya orang yang bertindak atas nama perusahaan kami untuk mengambil keuntungan, kami tegaskan di sini bahwa alamat kantor kami hanya yang tertulis di atas)</i></p>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision and Mission Section -->
    <section class="vision-mission-section">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Vision & Mission</h2>
            </div>
            <div class="vision-mission-container">
                <div class="vision-mission-box">
                    <h3>Visi</h3>
                    <p>Menjadi perusahaan terdepan dalam penyediaan peralatan keselamatan dan keamanan di Indonesia.</p>
                </div>
                <div class="vision-mission-box">
                    <h3>Misi</h3>
                    <ul>
                        <li>Misi - Customer First: Mengutamakan kepuasan pelanggan.</li>
                        <li>Misi - Quality: Menjamin kualitas produk yang terbaik.</li>
                        <li>Misi - Manpower: Mengembangkan sumber daya manusia yang handal.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="statistics_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-box">
                        <h2>1000+</h2>
                        <p>Number of Clients</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <h2>25+</h2>
                        <p>Top Quality Brands</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <h2>39</h2>
                        <p>Years of Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Careers Section -->
    <section class="careers_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Careers</h2>
            </div>
            <p></p>
            <div class="row">
                <div class="col-md-3">
                    <a href="https://glints.com/id/en/opportunities/jobs/staff-marketing/ccf49bc7-e8e4-496a-af45-d6e8f2bc6b37" class="career-box">
                        <h4>Marketing</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="https://glints.com/id/en/opportunities/jobs/staff-gudang-walk-in-interview/22a784f1-aa4b-468a-ad8d-76635fa7577d" class="career-box">
                        <h4>Warehouse</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="https://glints.com/id/en/opportunities/jobs/administration-staff/94c07cd1-3021-4b89-b3e6-dfd3b7f76f45" class="career-box">
                        <h4>Admin</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="career-box">
                        <h4>Helper</h4>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.footer')

    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
</body>
</html>
