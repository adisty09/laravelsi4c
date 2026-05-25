@extends('main')

@section('title', 'Edit Fakultas')

@section('content')
<a href="{{route('fakultas.create')}}" class="btn btn-secondary mb-3">Tambah Fakultas</a>
  @session('success')
      <div class="alert alert-success">
        {{ $value }}
      </div>

    
@endsession
<h2> Data Fakultas </h2>
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Nama Fakultas</th>
        <th>Singkatan</th>
        <th>Dekan</th>
        
    </tr>

    @foreach($fakultas as $key => $fakultas)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $fakultas->nama }}</td>
        <td>{{ $fakultas->Singkatan }}</td>
        <td>{{ $fakultas->Dekan }}</td>
        <td  class="d-flex d-inline gap-2">
            <a href="{{route('fakultas.edit', $fakultas->id)}}" class="btn btn-warning btn-rounded mb-2">Edit</a>
            <form method="POST" action="{{ route('fakultas.destroy', $fakultas->id)}}">
                @csrf
                <input name = "_method" type="hidden" value="DELETE">
                <button type="submit" class="btn btn-danger btn-rounded show_confirm" data-toggle="tooltip" 
                title = 'Delete' data-nama = '{{ $fakultas->nama}}'>Hapus</button>
            </form>
        </td>

    </tr>
    @endforeach

@endsection
