@extends('main')

@section('title')

@section('content')
<a href="{{('mahasiswa.index')}}" class="btn btn-primary mb-3">Kembali</a>
<form action="{{ route('mahasiswa.update', $mahasiswa->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="nama">Nama Mahasiswa</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') ?? $mahasiswa->nama}}">
        @error('nama')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="npm">NPM</label>
        <input type="text" name="npm" class="form-control" value="{{ old('npm') ?? $mahasiswa->npm}}">
        @error('npm')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="foto">FOTO</label>
        @if ($mahasiswa->foto)
            <div>
                <img src="{{('storage/'. $mahasiswa->foto)}}" alt="Foto {{ $mahasiswa->nama }}" width="150">
            </div>   
        @endif
        <input type="text" name="foto" class="form-control" id="foto" accept="image/*">
        @error('foto')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="from-group">
                <label for="fakultas_id">Program Studi</label>
                <select class="form-select" name="prodi_id" id="prodi_id">
                    <option disabled selected value="">-- Pilih Program Studi--</option>
                    @foreach ($prodi as $p)
                        <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_prodi }}</option>
                    @endforeach
                </select>
                @error('prodi_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
    <button type="submit" class="btn btn-secondary mt-3">Perbarui</button>
</form>

@endsection