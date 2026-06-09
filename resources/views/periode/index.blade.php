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
        <td>{{ $period->tahun_akademik }}</td>
        <td>{{ $period->kode_smt == 1 ? 'Ganjil' : 'Genap' }}</td>

    </tr>
    @endforeach

@endsection
