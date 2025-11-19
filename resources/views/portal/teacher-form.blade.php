@extends('layout.login-layout')
@section('title', $sitename)
@section('mainContent')
    <div class="container text-center mt-5 p-4">
        <h1>{{ $isEdit ? 'Edit Guru' : 'Tambah Guru Baru' }}</h1>
    </div>

    <div class="container mt-2 mb-2">
        <form 
            action="{{ $isEdit ? url('teacher/edit/'.$teacher->id) : url('teacher/create') }}"
            method="POST"
            enctype="multipart/form-data">
        @csrf
        @if($isEdit || $isEditPersonal)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Nama Guru</label>
            <input 
                type="text" 
                name="name" 
                class="form-control"
                value="{{ $isEdit ? $teacher->user->name : '' }}" 
                required>

            @if(!$isEditPersonal)
            <label class="form-label">Email Guru</label>
            <input 
                type="text" 
                name="email" 
                class="form-control"
                value="{{ $isEdit ? $teacher->user->email : '' }}" 
                required>
            @endif

            @if(!$isEdit)
                <label class="form-label">Tanggal Lahir</label>
                <input 
                    type="date" 
                    name="birthdate" 
                    class="form-control" 
                    value="{{ $isEdit ? $teacher->birthdate : '' }}" 
                    required>
            @endif

            @if(!$isEditPersonal)
            <label class="form-label">Posisi Guru</label>
            <input 
                type="text" 
                name="position" 
                class="form-control"
                value="{{ $isEdit ? $teacher->position : '' }}" 
                required>
            @endif

            <div class="mt-3">
                <label for="form-label">Foto</label>
                <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg">
                @if($isEdit && $teacher->image)
                    <div class="mt-2 mb-2 w-100 justify-content-center">
                        <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->user->name }}"
                    style="width: 120px; height:160px; object-fit:cover;">
                    </div>
                @endif 
            </div>

            <button type="submit" class="btn btn-success w-100">
                {{ $isEdit ? 'Simpan Perubahan' : 'Tambahkan Guru' }}
            </button>

            @if($isEditPersonal)
            <p>Ingin mengganti password? <a href="/teacher/password-change">tekan disini</a></p>
            @endif
        </div>
        </form>
    </div>
@endsection