@extends('layout.login-layout')
@section('title', 'Add Student')
@section('mainContent')
    <div class="container mt-5 p-4">
        <h1 class="fw-bold mb-4">Add New Student</h1>

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

        <form action="/student-create" method="POST" enctype="multipart/form-data" class="w-50">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
                @error('birthdate')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Student Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                @error('image')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Create Student</button>
                <a href="/student-list" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection