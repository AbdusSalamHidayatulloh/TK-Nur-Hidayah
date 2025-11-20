@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h1 class="fw-bold">{{ $maintitle }}</h1>
    </div>
    <div class="container mt-2 mb-2">
        <form action="/event-list" method="GET" class="form-inline w-100 d-flex gap-2" id="searchForm">
            <input type="search" placeholder="Search Event" name="eventSearch" class="form-control"
                value="{{ request('eventSearch') }}" id="searchInput">
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
    @if (auth()->user()?->role === 'admin')
        <div class="container mt-3 mb-3">
            <a href="/event-create" class="btn btn-success">Add New Event</a>
        </div>
    @endif
    <div class="container d-flex mt-2 justify-content-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Event</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Deskripsi</th>
                    @if (auth()->user()?->role === 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td><a href="/event/{{ $event->id }}">{{ $event->event_name }}</a></td>
                        <td>{{ $event->event_date_start }}</td>
                        <td>{{ $event->event_date_end }}</td>
                        <td>{{ Str::limit($event->event_description, 50) }}</td>
                        @if (auth()->user()?->role === 'admin')
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/event-edit/{{ $event->id }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="/event-delete/{{ $event->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure?')) this.closest('form').submit();">Delete</button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Tidak ada event yang tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="container">
        {{ $events->links() }}
    </div>
@endsection