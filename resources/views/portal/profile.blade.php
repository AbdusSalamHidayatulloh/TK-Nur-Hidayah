@extends('layout.login-layout')
@section('title', 'My Profile')
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h3>My Profile</h3>
    </div>

    {{-- Image section --}}
    <div class="text-center">
        @if (auth()->user()->teacher && auth()->user()->teacher->image)
            <img src="{{ asset('storage/' . auth()->user()->teacher->image) }}" class="object-fit-cover rounded border border-2 border-black" style="width: 225px; height: 300px;"
                alt="{{ auth()->user()->name }}">
        @else
            <div class="bg-light rounded border border-2 border-black d-flex align-items-center justify-content-center" style="width: 225px; height: 300px;">
                <p class="text-muted">No Image</p>
            </div>
        @endif
    </div>

    <div class="container text-center mt-4 bg-white rounded-4 p-4" style="max-width: 400px;">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">Nama:</th>
                    <td>{{ auth()->user()->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Email:</th>
                    <td>{{ auth()->user()->email }}</td>
                </tr>
                @if (auth()->user()->teacher)
                    <tr>
                        <th scope="row">Posisi:</th>
                        <td>{{ auth()->user()->teacher->position }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal Lahir:</th>
                        <td>{{ auth()->user()->teacher->birthdate }}</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <a href="/profile" class="mt-2 btn btn-warning">Edit Profile</a>
        <a href="/dashboard" class="mt-2 btn btn-primary">Back to Dashboard</a>
    </div>
@endsection