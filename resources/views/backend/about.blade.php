<!-- resources/views/about/index.blade.php -->
@extends('backend.layouts.index')

@section('content-header', 'About')

@section('content')
    <div class="container">
        <h1>Tentang Kami</h1>
        <p>Selamat datang di halaman tentang kami. Kami adalah perusahaan yang berdedikasi untuk memberikan layanan terbaik
            bagi pelanggan kami. Di bawah ini adalah beberapa testimoni dari pelanggan yang puas dengan layanan kami.</p>

        <div class="about">
            <blockquote>
                <p>"Ini adalah layanan terbaik yang pernah saya gunakan. Sangat direkomendasikan!"</p>
                <footer>- John Doe</footer>
            </blockquote>
        </div>
        <div class="about">
            <blockquote>
                <p>"Kualitas yang sangat baik dan dukungan pelanggan yang luar biasa."</p>
                <footer>- Jane Smith</footer>
            </blockquote>
        </div>

        <div class="about">
            <blockquote>
                <p>"Tim yang profesional dan responsif. Saya sangat puas dengan layanan mereka."</p>
                <footer>- Richard Roe</footer>
            </blockquote>
        </div>
    </div>
@endsection
