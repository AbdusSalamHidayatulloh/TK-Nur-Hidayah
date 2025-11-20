@extends('layout.login-layout')
@section('title', 'Edit Photo')
@section('mainContent')
    <div class="container mt-5 p-4">
        <h1 class="fw-bold mb-4">Edit Photo</h1>

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

        <form action="/photo-update/{{ $photo->id }}" method="POST" enctype="multipart/form-data" class="w-75">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Photo Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $photo->title) }}" required>
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date_taken" class="form-label">Date Taken</label>
                <input type="date" class="form-control @error('date_taken') is-invalid @enderror" id="date_taken" name="date_taken" value="{{ old('date_taken', $photo->date_taken) }}" required>
                @error('date_taken')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="current_image" class="form-label">Current Image</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $photo->image_path) }}" style="width: 200px; height: 250px; object-fit: cover;" alt="{{ $photo->title }}" class="rounded border">
                </div>
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Replace Image (Optional)</label>
                <input type="file" class="form-control @error('image_path') is-invalid @enderror" id="image_path" name="image_path" accept="image/*">
                <small class="text-muted">Leave blank to keep current image. Max 2MB.</small>
                @error('image_path')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="/event/{{ $photo->event_id }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection