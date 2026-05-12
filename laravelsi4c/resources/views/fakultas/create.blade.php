@extends('main')

@section('title', 'Tambah Fakultas')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('fakultas.store')}}" method="post">
        @csrf
        <div class="m-3">
            <h5>Form Pengisian Data Fakultas</h5>
            <label for="nama" class="form-label">Nama Fakultas</label>
            <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama Fakultas.." value={{old ('nama')}}>
            @error('nama')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <label for="singkatan" class="form-label">Singkatan Fakultas</label>
            <input name ="singkatan" type="text" class="form-control" id="singkatan" placeholder="Masukkan Singkatan Fakultas.." value={{old ('singkatan')}}>
            @error('singkatan')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <label for="dekan" class="form-label">Nama Dekan Fakultas</label>
            <input name="dekan" type="text" class="form-control" id="dekan" placeholder="Masukkan Nama Dekan.." value={{old ('dekan')}}>
            @error('dekan')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </form>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 
</body>

</html>
@endsection