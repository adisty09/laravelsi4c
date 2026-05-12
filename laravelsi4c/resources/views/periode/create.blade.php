@extends('main')

@section('title', 'Tambah Periode')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('periode.store')}}" method="post">
        @csrf
        <div class="m-3">
            <h5>Form Pengisian Data Periode</h5>
            <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
            <input name="tahun_akademik" type="text" class="form-control" id="tahun_akademik" placeholder="Masukkan Tahun Akademik.." value={{old ('tahun_akademik')}}>
            @error('tahun_akademik')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <label for="semester" class="form-label">Singkatan Fakultas</label>
            <input name ="semester" type="text" class="form-control" id="semester" placeholder="Masukkan Semester.." value={{old ('semester')}}>
            @error('semester')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </form>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 
</body>

</html>
@endsection