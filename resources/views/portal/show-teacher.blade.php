@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h3>Detil Guru</h3>
    </div>

    {{-- Image section --}}
    <div class="text-center">
        @if ($teacher->image)
            <img src="{{ asset('storage/' . $teacher->image) }}" class="object-fit-cover rounded border border-2 border-black" style="width: 225px; height: 300px;"
                alt="{{ $teacher->user->name }}">
        @else
            <div class="bg-light rounded border border-2 border-black d-flex align-items-center justify-content-center" style="width: 225px; height: 300px;">
                <p class="text-muted">No Image</p>
            </div>
        @endif
    </div>

    {{-- Informasi --}}
    <div class="container text-center mt-4 bg-white rounded-4 p-4" style="max-width: 400px;">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">Nama Guru:</th>
                    <td>{{ $teacher->user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Email:</th>
                    <td>{{ $teacher->user->email }}</td>
                </tr>
                <tr>
                    <th scope="row">Posisi:</th>
                    <td>{{ $teacher->position }}</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal Lahir:</th>
                    <td>{{ $teacher->birthdate }}</td>
                </tr>
            </tbody>
        </table>

        <a href="/teacher-list" class="mt-3 w-100 btn btn-primary">Kembali</a>
    </div>
@endsection