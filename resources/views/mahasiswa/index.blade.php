@extends('main')

@section('title', 'Mahasiswa')

@section('content') 
<a href="{{route('mahasiswa.create')}}" class="btn btn-dark mb-3">Tambah Mahasiswa</a>
@session('success')
      <div class="alert alert-success">
        {{ $value }}
      </div>
@endsession
<h1>Data Mahasiswa</h1>
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama Mahasiswa</th>
        <th>Program Studi</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    @foreach($mahasiswa as $key => $mhs)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $mhs->npm }}</td>
        <td>{{ $mhs->nama }}</td>
        <td>{{ $mhs->prodi->nama_prodi ??'-' }}</td>
        <td>
            <div>
            @if ($mhs->foto)
                <img src="{{ asset('storage/'. $mhs->foto)}}" alt="Foto" width="50">    
            @else
                <span class="text-muted">Tidak Ada Foto</span>  
            @endif
        </td>
        <td class="d-flex d-inline gap-2">
        <a href="{{route('mahasiswa.edit', $mhs->id)}}" class="btn btn-primary btn-rounded mb-2">Edit</a>
            <form method="POST" action="{{ route('mahasiswa.destroy', $mhs->id)}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-rounded show_confirm" data-toggle="tooltip" 
                title = 'Delete' data-nama = '{{ $mhs->nama}}'>Hapus</button>
            </form>
            </div>
        </td>
    </tr>
    @endforeach

</table>
@endsection
