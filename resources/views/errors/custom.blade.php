@extends('layout.login-layout')
@section('title', 'Error {{ $code }}')
@section('mainContent')
    <div class="container mt-5 p-4 text-center">
        <h1 class="fw-bold mb-4">Error {{ $code }}</h1>
        <p class="text-muted mb-4">{{ $message ?? 'An error occurred' }}</p>
        <a href="/dashboard" class="btn btn-primary">Go Home</a>
    </div>
@endsection