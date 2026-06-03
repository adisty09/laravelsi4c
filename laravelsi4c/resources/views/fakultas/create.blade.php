@extends('main')

@section('title', 'Tambah Fakultas')

@section('content')
    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('fakultas.store')}}" method="post">
        @csrf
        <div class="m-3">
            <h5>Form Pengisian Data Fakultas</h5>
            <label for="nama" class="form-label">Nama Fakultas</label>
            <input name="nama" type="text" class="form-control" id="nama"  value={{old ('nama')}}>
            @error('nama')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <label for="singkatan" class="form-label">Singkatan Fakultas</label>
            <input name ="singkatan" type="text" class="form-control" id="singkatan" value={{old ('singkatan')}}>
            @error('singkatan')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <label for="dekan" class="form-label">Nama Dekan Fakultas</label>
            <input name="dekan" type="text" class="form-control" id="dekan" value={{old ('dekan')}}>
            @error('dekan')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror
            <button type="submit" class="btn btn-secondary mt-3">Simpan</button>
        </div>
    </form>
@endsection