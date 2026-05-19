@extends('main')

@section('title', 'Tambah Fakultas')

@section('content')
<form action="{{ route('fakultas.update', $fakultas->id)}}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="nama">Nama Fakultas</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') ?? $fakultas->id}}">
        @error('nama')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="singkatan">Singkatan</label>
        <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') ?? $fakultas->id}}">
        @error('singkatan')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="dekan">Nama Fakultas</label>
        <input type="text" name="dekan" class="form-control" value="{{ old('dekan') ?? $fakultas->id}}">
        @error('dekan')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-secondary mt-3">Simpan</button>
</form>

@endsection