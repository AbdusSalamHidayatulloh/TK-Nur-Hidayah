@extends('layout.default-layout')
@section('title', 'Program')
@section('mainContent')
<div class="container">
    <div class="container text-center mt-5 p-4">
        <h1 class="fw-bold">Program TK Nur Hidayah</h1>
        <p class="lead mt-3">
            Mari bergabung dengan keluarga dan teman teman si kecil di <strong>TK/KB Nur Hidayah!</strong>
        </p>
    </div>

    <div class="d-flex mb-5 justify-content-center">
        <hr class="mt-0 mb-0 border border-1 border-black w-75">
    </div>

    <div class="row g-4">
        @foreach ($photos as $photo)
        <div class="col-md-4 col-sm-6">
            <div class="card shadow-sm h-100 overflow-hidden position-relative photo-card shadow-lg">
                <img src="{{ asset($photo->image_path) }}" class="card-img-top object-fit-cover" style="height: 300px;"
                    alt="{{ $photo->title }}">
                <div class="photo-overlay">
                    <p class="mb-0 text-white fw-bold">{{ $photo->title }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection