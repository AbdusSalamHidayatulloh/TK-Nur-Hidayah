@extends('layout.login-layout')
@section('title', 'Dashboard')
@section('mainContent')
    <div class="container mt-5 p-4">
        <h1 class="fw-bold mb-5">Welcome, {{ auth()->user()->name }}!</h1>

        @if (auth()->user()->role === 'admin')
            <div class="row gap-3">
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>Manage Students</h3>
                    <a href="/student-list" class="btn btn-primary">Go to Students</a>
                </div>
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>Manage Teachers</h3>
                    <a href="/teacher-list" class="btn btn-primary">Go to Teachers</a>
                </div>
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>Manage Events</h3>
                    <a href="/event-list" class="btn btn-primary">Go to Events</a>
                </div>
            </div>
        @elseif (auth()->user()->role === 'teacher')
            <div class="row gap-3">
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>View Students</h3>
                    <a href="/student-list" class="btn btn-primary">Go to Students</a>
                </div>
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>View Events</h3>
                    <a href="/event-list" class="btn btn-primary">Go to Events</a>
                </div>
                <div class="col-md-5 p-4 bg-white rounded-4 shadow-lg">
                    <h3>Your Profile</h3>
                    <a href="/my-profile" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        @endif
    </div>
@endsection