@extends('main')

@section('title', 'Periode')

@section('content')
<a href="{{route('periode.create')}}" class="btn btn-secondary mb-3">Tambah Periode</a>
<h2> Data Fakultas </h2>
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Tahun Akademik</th>
        <th>Semester</th>
        
    </tr>

    @foreach($period as $key => $period)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $fakultas->tahun_akademik }}</td>
        <td>{{ $fakultas->semester }}</td>

    </tr>
    @endforeach

@endsection
