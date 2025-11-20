@extends('layout.login-layout')
@section('title', 'Add Photo to Event')
@section('mainContent')
    <div class="container mt-5 p-4">
        <h1 class="fw-bold mb-4">Add Photo to Event</h1>

        @if (session('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/event/{{ $event->id }}/photos" method="POST" enctype="multipart/form-data" class="w-75">
            @csrf

            <div class="mb-3">
                <label for="photos" class="form-label">Select Photos</label>
                <input type="file" class="form-control @error('photos') is-invalid @enderror" id="photos" name="photos[]" accept="image/*" multiple required>
                <small class="text-muted">You can select multiple photos (max 2MB each)</small>
                @error('photos')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Add Photos</button>
                <a href="/event/{{ $event->id }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection