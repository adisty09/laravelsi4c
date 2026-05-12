@extends('main')

@section('title', 'Fakultas')

@section('content')
<a href="{{route('fakultas.create')}}" class="btn btn-secondary mb-3">Tambah Fakultas</a>
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

    </tr>
    @endforeach

@endsection
