@extends('layout.login-layout')
@section('title', 'Apakah anda yakin?')
@section('mainContent')
    <div class="container">
        <h2>Anda masih terhubung dengan akun anda</h2>
        <p>Apakah anda ingin logout untuk mengakses bagian ini?</p>

        <a class="btn btn-danger" href="?logout=1">Iya, logout</a>
        <a class="btn btn-primary" href="{{ url()->previous() }}">Tidak, kembali</a>
    </div>
@endsection
