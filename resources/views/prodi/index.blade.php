@extends('main')

@section('title', 'Program Studi')

@section('content') 
<a href="{{route('prodi.create')}}" class="btn btn-dark mb-3">Tambah Program Studi</a>
@session('success')
      <div class="alert alert-success">
        {{ $value }}
      </div>
@endsession
<h1>Data Prodi</h1>
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Singkatan</th>
        <th>Kaprodi</th>
        <th>Fakultas</th>
    </tr>

    @foreach($prodis as $key => $prodi)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $prodi->nama_prodi }}</td>
        <td>{{ $prodi->singkatan }}</td>
        <td>{{ $prodi->kaprodi }}</td>
        <td>{{ $prodi->fakultas->nama ?? '-' }}</td>
        <td>
            <div class="d-flex d-inline gap-2">
                <a href="{{route('prodi.edit', $prodi->id)}}" class="btn btn-primary btn-rounded mb-2">Edit</a>
                <form method="POST" action="{{ route('prodi.destroy', $prodi->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-rounded show_confirm" data-toggle="tooltip" 
                    title = 'Delete' data-nama = '{{ $prodi->nama_prodi}}'>Hapus</button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach

</table>
@endsection
