@extends('main')

@section('title', 'Fakultas')

@section('content')
    


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
        <td>{{ $fakultas->nama_fakultas }}</td>
        <td>{{ $fakultas->singkatan }}</td>
        <td>{{ $fakultas->dekan }}</td>

    </tr>
    @endforeach

@endsection
@endsection