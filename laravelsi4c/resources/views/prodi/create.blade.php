@extends('main')

@section('title', 'Tambah Program Studi')

@section('content')


    <form action="/prodi" method="post">
        <div class="m-3">
            <h5>Form Pengisian Data Program Studi</h5>
            <label for="nama_prodi" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control"name="nama_prodi" id="nama_prodi" placeholder="Masukkan Nama Prodi.."
                value={{ old('nama') }}>
            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="singkatan" class="form-label">Singkatan Prodi</label>
            <input name="singkatan" type="text" class="form-control" id="singkatan"
                placeholder="Masukkan Singkatan Prodi.." value={{ old('nama') }}>
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="kaprodi" class="form-label">Nama Kaprodi</label>
            <input name="kaprodi" type="text" class="form-control" id="kaprodi" placeholder="Masukkan Nama Kaprodi.."
                value{{ old('nama') }}>
            @error('kaprodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="from-group">
                <label for="fakultas_id">Fakultas</label>
                <select class="form-select" name="fakultas_id" id="">
                    <option disabled selected value="">-- Pilih Fakultas--</option>
                    @foreach ($fakultas as $f)
                        <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>
                            {{ $f->nama }}</option>
                    @endforeach
                </select>
                @error('fakultas_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </form>

@endsection
