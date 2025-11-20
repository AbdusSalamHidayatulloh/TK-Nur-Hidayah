@extends('layout.login-layout')
@section('title', $code . ' - Error')

@section('mainContent')
<div class="container text-center mt-5">
    <h1>Sesi anda habis. untuk melanjutkan, silahkan login kembali atau keluar</h1>
    <a href="/student-list" class="btn btn-primary mt-3">Login</a>
    <a href="/" class="btn btn-secondary">Keluar</a>
</div>
@endsection