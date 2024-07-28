<!-- resources/views/about/index.blade.php -->

<!-- Menggunakan layout yang ada di 'backend.layouts.index' -->
@extends('backend.layouts.index')

<!-- Bagian ini akan diisi dengan 'About' sebagai judul konten -->
@section('content-header', 'About')

<!-- Bagian konten utama -->
@section('content')
    <!-- Container utama untuk konten 'Tentang Kamiiii' -->
    <div class="container">
        <!-- Judul halaman -->
        <h1>Tentang Kami</h1>

        <!-- Paragraf perkenalan tentang perusahaan -->
        <p>Selamat datang di halaman tentang kami. Kami adalah perusahaan yang berdedikasi untuk memberikan layanan terbaik
            bagi pelanggan kami. Di bawah ini adalah beberapa testimoni dari pelanggan yang puas dengan layanan kami.</p>

        <!-- Div untuk blok testimoni pertama -->
        <div class="about">
            <!-- Blockquote digunakan untuk menandai kutipan atau testimoni -->
            <blockquote>
                <!-- Testimoni pelanggan -->
                <p>"Ini adalah layanan terbaik yang pernah saya gunakan. Sangat direkomendasikan!"</p>
                <!-- Footer untuk menyebutkan nama pelanggan yang memberikan testimoni -->
                <footer>- John Doe</footer>
            </blockquote>
        </div>

        <!-- Div untuk blok testimoni kedua -->
        <div class="about">
            <blockquote>
                <p>"Kualitas yang sangat baik dan dukungan pelanggan yang luar biasa."</p>
                <footer>- Jane Smith</footer>
            </blockquote>
        </div>

        <!-- Div untuk blok testimoni ketiga -->
        <div class="about">
            <blockquote>
                <p>"Tim yang profesional dan responsif. Saya sangat puas dengan layanan mereka."</p>
                <footer>- Richard Roe</footer>
            </blockquote>
        </div>
    </div>
@endsection
