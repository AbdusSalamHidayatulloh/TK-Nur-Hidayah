@extends('layout.default-layout')
@section('title', 'Selamat Datang!')
@section('mainContent')
<<<<<<< Updated upstream
    <div class="hero d-flex justify-content-center align-items-center text-center position-relative">
        <img src="/image/senam_bersama.jpg" class="w-100 object-fit-cover"
            style="height: 700px; object-position: center; filter: brightness(50%);">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h3>Selamat Datang Di</h3>
            <h1 class="fw-bolder d-flex align-items-center justify-content-center">TK/KB Nur Hidayah!</h1>
            <p class="text-center fw-bold">„Pendidikan yang unggul dalam IMTAQ, Karakter dan Kreatifitas"</p>
            <a href="/about-us" class="btn btn-primary">
                Yuk Pelajari Kami! <span class="material-symbols-rounded"
                    style="vertical-align: middle; font-size: 18px;">arrow_forward</span>
=======
<div class="hero d-flex justify-content-center align-items-center text-center position-relative">
    <img src="/image/senam_bersama.jpg" class="w-100 object-fit-cover"
        style="height: 700px; object-position: center; filter: brightness(50%);">
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
        <h3>Selamat Datang Di</h3>
        <h1 class="fw-bolder d-flex align-items-center justify-content-center">TK/KB Nur Hidayah!</h1>
        <a href="/about-us" class="btn btn-primary">
            Yuk Pelajari Kami! <span class="material-symbols-rounded"
                style="vertical-align: middle; font-size: 18px;">arrow_forward</span>
        </a>
    </div>
</div>
<!-- Main below hero -->


<!-- Why Choose Us -->
<div class="mt-5 mb-5 container">
    <p class="text-center fw-bold">"Pendidikan yang unggul dalam IMTAQ, Karakter dan Kreatifitas"</p>
    
</div>

<!-- Program -->
<div class="mt-5 mb-5 container">
    <h1 class="mb-5 text-center fw-bold">Jelajahi Program Kami!</h1>

    <div class="d-flex flex-column flex-md-row justify-content-lg-between align-items-center gap-2">
        @foreach ($photos as $photo)
        <div class="card shadow-sm h-100" style="width: 100%; max-width: 400px">
            <img src="{{ asset($photo->image_path) }}" class="card-img-top object-fit-cover" style="height: 300px;"
                alt="{{ $photo->title }}">
            <div class="card-body text-center">
                <p class="card-title fw-bold">{{ $photo->title }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3 text-center">
        <p>Untuk penjelasan lebih dalam, tekam tombol dibawah</p>
        <div class="d-flex justify-content-center">
            <a href="/programs" class="btn btn-primary mb-0">
                Pelajari Lebih Lagi <span class="material-symbols-rounded"
                    style="vertical-align: middle; font-size: 18px;">school</span>
>>>>>>> Stashed changes
            </a>
        </div>
    </div>
    <!-- Main below hero -->
    <!-- Why Choose Us -->
    <div class="mt-5 mb-5 container">

<<<<<<< Updated upstream
=======
<!-- Enlist / Enrollment CTA -->

<div class="container mt-5">
    <h1 class="text-center fw-bold mb-3">Mulailah Awal Cerah Untuk Anak Anda</h1>
    <p class="text-center mt-3 mb-3">Daftarkan anak Anda di TK/KB Nur Hidayah dengan lingkungan yang menyenangkan, aman dan penuh
        kasih sayang</p>
    <div class="d-flex justify-content-center">
        <a href="/enlist" class="btn btn-primary">Daftar Sekarang <span class="material-symbols-rounded"
                style="vertical-align: middle; font-size: 18px;">group</span>
        </a>
>>>>>>> Stashed changes
    </div>

    <!-- Program -->
    <div class="mt-5 mb-5 container">
        <h1 class="mb-5 text-center fw-bold">Jelajahi Program Kami!</h1>

        <div class="d-flex flex-column flex-md-row justify-content-lg-between align-items-center gap-2">
            @foreach ($photos as $photo)
                <div class="card shadow-sm h-100 overflow-hidden position-relative photo-card"
                    style="width: 100%; max-width: 400px;">
                    <img src="{{ asset($photo->image_path) }}" class="card-img-top object-fit-cover" style="height: 300px;"
                        alt="{{ $photo->title }}">
                    <div class="photo-overlay">
                        <p class="mb-0 text-white fw-bold">{{ $photo->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3 text-center">
            <p>Untuk penjelasan lebih dalam, tekan tombol dibawah</p>
            <div class="d-flex justify-content-center">
                <a href="/programs" class="btn btn-primary mb-0">
                    Pelajari Lebih Lanjut <span class="material-symbols-rounded"
                        style="vertical-align: middle; font-size: 18px;">school</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Enlist / Enrollment CTA -->

    <div class="container mt-5">
        <h1 class="text-center fw-bold mb-3">Mulailah Awal Cerah Untuk Anak Anda</h1>
        <p class="text-center mt-3 mb-2">Daftarkan anak Anda di TK/KB Nur Hidayah dengan lingkungan yang menyenangkan, aman
            dan penuh
            kasih sayang</p>
        <div class="d-flex justify-content-center">
            <a href="/enlist" class="btn btn-primary">Daftar Sekarang <span class="material-symbols-rounded"
                    style="vertical-align: middle; font-size: 18px;">group</span>
            </a>
        </div>
    </div>

@endsection
