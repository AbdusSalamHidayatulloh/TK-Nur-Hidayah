@extends('layout.default-layout')
@section('title', 'Selamat Datang!')
@section('mainContent')
    <div class="hero d-flex justify-content-center align-items-center text-center position-relative">
        <img src="/image/senam_bersama.jpg" class="w-100 object-fit-cover"
            style="height: 700px; object-position: center; filter: brightness(50%);">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h3>Selamat Datang Di</h3>
            <h1 class="fw-bolder d-flex align-items-center justify-content-center">TK/KB Nur Hidayah!</h1>
        </div>
    </div>
    <!-- Main below hero -->
    <!-- Why Choose Us -->
    <div class="mt-5 mb-5 container">
        <h1 class="mb-5 text-center fw-bold">Mengapa Pilih Kami?</h1>
        <div class="row text-center gap-3 justify-content-center">
            <div class="col-md-5 p-2 bg-white rounded-4 shadow-lg">
                <span class="material-symbols-rounded text-danger" style="font-size: 60px;">Favorite</span>
                <h4 class="fw-bold mt-3">Penanaman Nilai-Nilai Islami</h4>
                <p>Kami memberikan pendidikan yang mengembangkan kreatifitas & iman</p>
            </div>
            <div class="col-md-5 p-2 bg-white rounded-4 shadow-lg">
                <span class="material-symbols-rounded text-info" style="font-size: 60px;">sentiment_very_satisfied</span>
                <h4 class="fw-bold mt-3">Lingkungan Aman & Nyaman</h4>
                <p>Ruang kelas bersih, area bermain luas, dan lingkungan yang ramah</p>
            </div>
            <div class="col-md-5 p-2 bg-white rounded-4 shadow-lg">
                <span class="material-symbols-rounded text-primary" style="font-size: 60px;">palette</span>
                <h4 class="fw-bold mt-3">Program Belajar Kreatif</h4>
                <p>Kegiatan belajar dikemas secara menarik dan sesuai dengan nilai islamik</p>
            </div>
            <div class="col-md-5 p-2 bg-white rounded-4 shadow-lg">
                <span class="material-symbols-rounded text-success" style="font-size: 60px;">home</span>
                <h4 class="fw-bold mt-3">Lingkungan Aman & Nyaman</h4>
                <p>Lingkungan yang bersih, CCTV dan penjaga yang menjaga buah hati anda</p>
            </div>
        </div>
    </div>

    <!-- Program -->
    <div class="mt-5 mb-5 container">
        <h1 class="mb-5 text-center fw-bold">Jelajahi Program Kami!</h1>

        <div class="d-flex flex-column flex-md-row justify-content-lg-between align-items-center gap-2">
            @foreach ($photos as $photo)
                <div class="card shadow-sm h-100 overflow-hidden position-relative photo-card shadow-lg"
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
        <h1 class="text-center fw-bold mb-5">Mulailah Awal Cerah Untuk Anak Anda</h1>
        <p class="text-center mt-3 mb-3">Daftarkan anak Anda di TK/KB Nur Hidayah dengan lingkungan yang menyenangkan, aman
            dan penuh
            kasih sayang</p>
        <div class="d-flex justify-content-center">
            <a href="/enlist" class="btn btn-primary">Daftar Sekarang <span class="material-symbols-rounded"
                    style="vertical-align: middle; font-size: 18px;">group</span>
            </a>
        </div>
    </div>

@endsection
