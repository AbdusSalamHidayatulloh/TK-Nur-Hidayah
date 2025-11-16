@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container mt-5 p-4">
        <h1 class="fw-bold mb-4">Edit Student</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/student/{{ $student->id }}" method="POST" enctype="multipart/form-data" class="w-50">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ old('birthdate', $student->birthdate) }}" required>
                @error('birthdate')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Student Image</label>
                @if ($student->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $student->image) }}" style="width: 100px; height: 150px;" alt="{{ $student->name }}">
                    </div>
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Update Student</button>
                <a href="/student-list" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection