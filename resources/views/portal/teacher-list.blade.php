@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h1 class="fw-bold">{{ $maintitle }}</h1>
    </div>
    <div class="container mt-2 mb-2">
        <form action="/teacher-list" method="GET" class="form-inline w-100 d-flex flex-md-row flex-column gap-2">
            <input type="search" placeholder="Search" name="teacherSearch" class="form-control">
            <button type="submit" class="btn btn-outline-success">Cari</button>
        </form>
        @if(auth()->user()->role === 'admin')
            <a href="/teacher-create" class="btn btn-outline-primary w-100 mt-2">Membuat Murid Baru</a>
        @endif
    </div>
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

@endsection