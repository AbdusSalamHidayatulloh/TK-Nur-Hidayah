@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h1 class="fw-bold">{{ $maintitle }}</h1>
    </div>

    @if (session('Success'))
        <div class="container mt-2 mb-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-8">
                <h3>Event Details</h3>
                <p><strong>Start Date:</strong> {{ $event->event_date_start }}</p>
                <p><strong>End Date:</strong> {{ $event->event_date_end }}</p>
                <p><strong>Description:</strong> {{ $event->event_description }}</p>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Event Photos ({{ $event->photos->count() }})</h3>
            @if (auth()->user()?->role === 'admin')
                <a href="/photo-create/{{ $event->id }}" class="btn btn-success">Add Photos</a>
            @endif
        </div>

        @if ($event->photos->count() > 0)
            <div class="row">
                @foreach ($event->photos as $photo)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $photo->image_path) }}" class="card-img-top"
                                alt="{{ $photo->title }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $photo->title }}</h5>
                                <p class="card-text text-muted small">{{ $photo->date_taken }}</p>
                                @if (auth()->user()?->role === 'admin')
                                    <div class="d-flex gap-2">
                                        <a href="/photo-edit/{{ $photo->id }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="/photo-delete/{{ $photo->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="if(confirm('Delete this photo?')) this.closest('form').submit();">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No photos for this event yet.</p>
        @endif
    </div>

    <div class="container mt-4 mb-4">
        <a href="/event-list" class="btn btn-primary">Back to Events</a>
    </div>
@endsection
