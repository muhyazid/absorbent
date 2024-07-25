<!-- resources/views/testimonials/index.blade.php -->
@extends('backend.layouts.index')

@section('content-header', 'Testimoni')

@section('content')
    <div class="container">
        <div class="testimonial">
            <blockquote>
                <p>"Ini adalah layanan terbaik yang pernah saya gunakan. Sangat direkomendasikan!"</p>
                <footer>- John Doe</footer>
            </blockquote>
        </div>
        <div class="testimonial">
            <blockquote>
                <p>"Kualitas yang sangat baik dan dukungan pelanggan yang luar biasa."</p>
                <footer>- Jane Smith</footer>
            </blockquote>
        </div>
        <!-- Tambahkan lebih banyak testimoni di sini -->
    </div>
@endsection
