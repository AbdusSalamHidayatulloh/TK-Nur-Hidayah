@extends('layout.default-layout')
@section('title', 'Fasilitas Kami')
@section('mainContent')
<div class="container text-center mt-5 p-4">
    <h1 class="fw-bold">Fasilitas Kami</h1>
    <p class="lead mt-3">
        Kami mendukung pembelajaran anak anda di <strong>TK Nur Hidayah</strong> dengan lingkungan yang nyaman dan
        bersih!
    </p>
</div>
<div class="d-flex mb-5 justify-content-center">
    <hr class="mt-0 mb-0 border border-1 border-black w-75">
</div>
<div class="container d-flex flex-column gap-2 mt-5">
    @foreach ($facilities as $facility)
    <div class="d-flex flex-column flex-md-row justify-content-around align-items-center">
        <div class="flex-md-shrink-1">
            <img src="{{ $facility->image_path }}" width="350" height="250" class="w-100 w-md-auto">
        </div>
        <div class="w-100 width-md">
            <h3 class="fw-bold text-center text-md-start">{{ $facility->name }}</h3>
            <p class="text-center text-md-start">{{ $facility->description }}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection