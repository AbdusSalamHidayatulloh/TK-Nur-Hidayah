@extends('layout.login-layout')
@section('title', $code . ' - Error')

@section('mainContent')
<div class="container text-center mt-5">
    <h1>{{ $code }} - {{ $message }}</h1>
    <a href="/dashboard" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection