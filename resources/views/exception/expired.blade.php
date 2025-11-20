@extends('layout.login-layout')
@section('title', 'Sesi Selesai')

@section('mainContent')
    <div class="container text-center mt-5">
        <h1>Sesi anda habis. untuk melanjutkan, silahkan login kembali atau keluar</h1>
        <div class="d-flex flex-column gap-4">
            <a href="/login" class="btn btn-primary mt-3">Login</a>
            <a href="/" class="btn btn-secondary">Keluar</a>
        </div>
    </div>
@endsection
