@extends("layout.default-layout")
@section("title", "Selamat Datang!")
@section("mainContent")
    <div class="hero d-flex justify-content-center align-items-center text-center position-relative">
        <img src="/image/senam_bersama.jpg" class="w-100 object-fit-cover" style="height: 700px; object-position: center; filter: brightness(50%);">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h3>Selamat Datang Di</h3>
            <h1 class="fw-bolder">TK/KB Nur Hidayah!</h1>
            <a href="/about-us" class="btn btn-primary">
                Yuk Pelajari Kami! <span class=""></span>
            </a>
        </div>
    </div>
@endsection