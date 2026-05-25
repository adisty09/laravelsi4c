@extends('main')

@section('title', 'Tambah Mahasiswa')

@section('content')


    <form action="/prodi" method="post">
        <div class="m-3">
            <h5>Form Pengisian Data Program Studi</h5>
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control"name="nama_prodi" id="nama_prodi" placeholder="Masukkan Nama Prodi.."
                value={{ old('npm') }}>
            @error('npm')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input name="nama" type="text" class="form-control" id="singkatan"
                placeholder="Masukkan Nama Mahasiswa..." value={{ old('nama') }}>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="foto" class="form-label">Foto</label>
            <input name="foto" type="text" class="form-control" id="foto" 
                value{{ old('foto') }}>
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="from-group">
                <label for="fakultas_id">Program Studi</label>
                <select class="form-select" name="nama_prodi" id="">
                    <option disabled selected value="">-- Pilih Fakultas--</option>
                    @foreach ($prodi as $p)
                        <option value="{{ $p->id }}" {{ old('nama_prodi') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_prodi }}</option>
                    @endforeach
                </select>
                @error('nama_prodi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </form>

@endsection
