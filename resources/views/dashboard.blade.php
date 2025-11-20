@extends('layout.login-layout')
@section('title', 'Dashboard')
@section('mainContent')
    <div class="container mt-5 p-4">
        <h1 class="fw-bold mb-5 text-center">Welcome, {{ auth()->user()->name }}!</h1>

        @if (session('Success'))
            <div class="container mt-2 mb-2">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('Success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (auth()->user()->role === 'admin')
            <div class="row gap-4">
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>Manage Students</h3>
                    <a href="/student-list" class="btn btn-primary mt-3 w-100">Go to Students</a>
                </div>
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>Manage Teachers</h3>
                    <a href="/teacher-list" class="btn btn-primary mt-3 w-100">Go to Teachers</a>
                </div>
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>Manage Events</h3>
                    <a href="/event-list" class="btn btn-primary mt-3 w-100">Go to Events</a>
                </div>
            </div>
        @elseif (auth()->user()->role === 'teacher')
            <div class="row gap-4">
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>View Students</h3>
                    <a href="/student-list" class="btn btn-primary mt-3 w-100">Go to Students</a>
                </div>
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>View Events</h3>
                    <a href="/event-list" class="btn btn-primary mt-3 w-100">Go to Events</a>
                </div>
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>Your Profile</h3>
                    <a href="/my-profile" class="btn btn-primary mt-3 w-100">Edit Profile</a>
                </div>
            </div>
        @endif
    </div>
@endsection
