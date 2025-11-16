@extends('layout.login-layout')
@section('title', 'Edit Event')
@section('mainContent')
    <div class="container mt-5 p-4">
        <h1 class="fw-bold mb-4">Edit Event</h1>

        @if (session('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/event/{{ $event->id }}" method="POST" enctype="multipart/form-data" class="w-75">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="event_name" class="form-label">Event Name</label>
                <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name" name="event_name" value="{{ old('event_name', $event->event_name) }}" required>
                @error('event_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="event_date_start" class="form-label">Start Date</label>
                <input type="date" class="form-control @error('event_date_start') is-invalid @enderror" id="event_date_start" name="event_date_start" value="{{ old('event_date_start', $event->event_date_start) }}" required>
                @error('event_date_start')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="event_date_end" class="form-label">End Date</label>
                <input type="date" class="form-control @error('event_date_end') is-invalid @enderror" id="event_date_end" name="event_date_end" value="{{ old('event_date_end', $event->event_date_end) }}" required>
                @error('event_date_end')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="event_description" class="form-label">Description</label>
                <textarea class="form-control @error('event_description') is-invalid @enderror" id="event_description" name="event_description" rows="4" required>{{ old('event_description', $event->event_description) }}</textarea>
                @error('event_description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="/event-list" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection