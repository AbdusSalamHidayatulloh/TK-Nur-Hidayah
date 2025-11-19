@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h3>Detil Murid</h3>
    </div>

    {{-- Image section --}}
    <div class="text-center">
        <img src="{{ asset($teacher->image) }}" class="object-fit-cover rounded border border-2 border-black" style="width: 225px; height: 300px;"
            alt="{{ $teacher->name }}">
    </div>

    {{-- Informasi --}}
    <div class="container text-center mt-4 bg-white rounded-4 p-2" style="max-width: 300px;">
        <table class="table table-borderless table-white">
            <tbody>
                <tr>
                    <th scope="row">Nama Guru:</th>
                    <td>{{ $teacher->user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Posisi</th>
                    <td>{{ $teacher->position }}</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td>{{ $teacher->birthdate }}</td>
                </tr>
            </tbody>
        </table>

        <a href="/teacher-list" class="mt-2 w-100 btn btn-primary">Kembali</a>
    </div>
@endsection
