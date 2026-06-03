@extends('main')

@section('title', 'Edit Program Studi')

@section('content')
    <a href="{{ route('prodi.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_prodi">Nama Program Studi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama_prodi') ?? $prodi->nama_prodi }}">
            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="singkatan">Singkatan</label>
            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') ?? $prodi->singkatan }}">
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dekan">Nama Kaprodi</label>
            <input type="text" name="kaprodi" class="form-control" value="{{ old('kaprodi') ?? $prodi->kaprodi }}">
            @error('kaprodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="from-group">
            <label for="fakultas_id">Fakultas</label>
            <select class="form-select" name="fakultas_id" id="fakultas_id">
                <option disabled selected value="">-- Pilih Fakultas--</option>
                @foreach ($fakultas as $fak)
                    <option value="{{ $fak->id }}"
                        {{ old('fakultas_id', $prodi->fakultas_id) == $fak->id ? 'selected' : '' }}>
                        {{ $fak->nama }}</option>
                @endforeach
            </select>
            @error('fakultas_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror


        </div>
        <button type="submit" class="btn btn-secondary mt-3">Perbarui</button>
    </form>

@endsection
