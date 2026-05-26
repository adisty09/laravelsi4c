@extends('main')

@section('title', 'Tambah Mahasiswa')

@section('content')


    <form action="{{route('mahasiswa.store')}}"method="post" enctype="multipart/form-data">
        <div class="m-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Mahasiswa"
                value={{ old('nama') }}>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="npm" class="form-label">NPM</label>
            <input name="npm" type="text" class="form-control" id="npm"
                placeholder="Masukkan NPM Mahasiswa..." value={{ old('npm') }}>
            @error('npm')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="foto" class="form-label">Foto</label>
            <input name="foto" type="file" class="form-control" id="foto" accept="image/*">
             @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror 
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


            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </form>

@endsection
