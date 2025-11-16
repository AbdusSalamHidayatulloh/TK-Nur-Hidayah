@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h1>{{ $isEdit ? 'Edit Murid' : 'Tambah Murid Baru' }}</h1>
    </div>

    <div class="container mt-2 mb-2">
        <form 
            action="{{ $isEdit ? url('student/edit/'.$student->id) : url('student/create') }}"
            method="POST"
            enctype="multipart/form-data">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Nama Murid</label>
            <input 
                type="text" 
                name="name" 
                class="form-control"
                value="{{ $isEdit ? $student->name : '' }}" 
                required>

            @if(!$isEdit)
                <label class="form-label">Tanggal Lahir</label>
                <input 
                    type="date" 
                    name="birthdate" 
                    class="form-control" 
                    value="{{ $isEdit ? $student->birthdate : '' }}" 
                    required>
            @endif

            <div class="mt-3">
                <label for="form-label">Foto</label>
                <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg">
                @if($isEdit && $student->image)
                    <img src="{{ asset($student->image) }}" alt="{{ $student->name }}"
                    style="width: 120px; height:160px; object-fit:cover;">
                @endif 
            </div>

            <button type="submit" class="btn btn-success w-100">
                {{ $isEdit ? 'Simpan Perubahan' : 'Tambahkan Murid' }}
            </button>
        </div>
        </form>
    </div>
@endsection