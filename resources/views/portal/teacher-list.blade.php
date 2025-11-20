@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h1 class="fw-bold">{{ $maintitle }}</h1>
    </div>
    <div class="container mt-2 mb-2">
        <form action="/teacher-list" method="GET" class="form-inline w-100 d-flex gap-2" id="searchForm">
            <input type="search" placeholder="Search Teacher" name="teacherSearch" class="form-control"
                value="{{ request('searchTeacher') }}" id="searchInput">
            <button type="submit" class="btn btn-outline-success">Search</button>
            <button type="button" class="btn btn-outline-secondary"
                onclick="document.getElementById('searchInput').value = ''; document.getElementById('searchForm').submit();">Clear</button>
        </form>
    </div>
    @if (session('Success'))
        <div class="container mt-2 mb-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (auth()->user()->role === 'admin')
        <div class="container mt-3 mb-3">
            <a href="/teacher-create" class="btn btn-success">Membuat Guru Baru</a>
        </div>
    @endif
    <div class="container d-flex mt-2 justify-content-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Tanggal Lahir</th>
                    @if (auth()->user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $te)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td><a href="/teacher/{{ $te->id }}">{{ $te->user->name }}</a></td>
                        <td>{{ $te->position }}</td>
                        <td>{{ $te->birthdate }}</td>
                        @if (auth()->user()->role === 'admin')
                            <td>
                                <a href="/teacher-edit/{{ $te->id }}" class="btn btn-primary">Edit</a>
                                <form action="/teacher-delete/{{ $te->id }}" method="POST">
                                    {{-- Validasi aksi saat ditekan --}}
                                    @csrf
                                    {{-- Pake method delete --}}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Tidak ada murid yang tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="container">
        {{ $teachers->links() }}
    </div>
@endsection