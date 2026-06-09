@extends('main')

@section('title', 'Tambah Program Studi')

@section('content')

    <a href="{{ route('prodi.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('prodi.store') }}" method="post">
        <div class="m-3">
            <h5>Form Pengisian Data Program Studi</h5>
            <label for="nama_prodi" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control"name="nama_prodi" id="nama_prodi"
                value={{ old('nama_prodi') }}>
            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="singkatan" class="form-label">Singkatan Prodi</label>
            <input name="singkatan" type="text" class="form-control" id="singkatan"
                 value={{ old('singkatan') }}>
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="kaprodi" class="form-label">Nama Kaprodi</label>
            <input name="kaprodi" type="text" class="form-control" id="kaprodi"
                value={{ old('kaprodi') }}>
            @error('kaprodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="from-group">
                <label for="fakultas_id">Fakultas</label>
                <select class="form-select" name="fakultas_id" id="">
                    <option disabled selected value="">-- Pilih Fakultas--</option>
                    @foreach ($fakultas as $fak)
                        <option value="{{ $fak->id }}" {{ old('fakultas_id') == $fak->id ? 'selected' : '' }}>
                            {{ $fak->nama }}</option>
                    @endforeach
                </select>
                @error('fakultas_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


            </div>

            <button type="submit" class="btn btn-secondary mt-3">Simpan</button>
        </div>
    </form>

@endsection
