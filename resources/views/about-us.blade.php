@extends('layout.default-layout')
@section('title', 'Daftarkan Sekarang')
@section('mainContent')
<div class="container text-center mt-5 p-4">
    <h1 class="fw-bold">Tentang TK Nur Hidayah</h1>
    <p class="lead mt-3">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum. </p>
</div>
<div class="d-flex justify-content-center">
    <hr class="mt-0 mb-0 border border-1 border-black w-75">
</div>
<div class="container text-center mt-5 p-4">
    <h1 class="fw-bold">Visi TK Nur Hidayah</h1>
    <p class="lead mt-3">
        Pendidikan yang unggul dalam IMTAQ, Karakter dan Kreatifitas
    </p>
</div>

<div class="d-flex flex-row justify-content-between">
    <div class="container text-center mt-5 p-4">
        <h3 class="fw-bold">Misi TK Nur Hidayah</h3>
        <p class="lead mt-3">
            1. Mengembangkan IMTAQ yang kuat
        </p>
        <p class="lead mt-3">
            2. Membangun karakter yang unggul
        </p>
        <p class="lead mt-3">
            3. Menumbuhkan kreatifitas dan inovasi
        </p>
        <p class="lead mt-3">
            4. Meningkatkan kualitas pembelajaran
        </p>
        <p class="lead mt-3">
            5. Membangun kerjasama dengan stakeholder
        </p>
    </div>

    <div class="container text-center mt-5 p-4">
        <h3 class="fw-bold">Tujuan TK Nur Hidayah</h3>
        <p class="lead mt-3">
            1. Meningkatkan kualitas IMTAQ murid
        </p>
        <p class="lead mt-3">
            2. Membentuk karakter yang unggul
        </p>
        <p class="lead mt-3">
            3. Meningkatkan prestasi akademik
        </p>
        <p class="lead mt-3">
            4. Mempersiapkan murid untuk menghadapi masa depan
        </p>
    </div>
</div>


<div class="container">
    <h2 class="text-center mb-4 fw-bold">Guru Kami</h2>

    <div class="row g-4">
        @foreach ($teachers as $teacher)
        <div class="col-md-4 col-sm-6">
            <div class="card shadow-sm h-100 overflow-hidden position-relative photo-card" style="height: 400px;">
                <img src="{{ asset($teacher->image ?? 'image/defaultTeacher.png') }}"
                    class="card-img-top object-fit-cover" style="height: 250px; width: 100%; object-fit: cover;"
                    alt="{{ $teacher->name }}">
                <div class="photo-overlay">
                    <p class="mb-0 text-white fw-bold">{{ $teacher->name }}</p>
                    <small class="text-white">{{ $teacher->position }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection