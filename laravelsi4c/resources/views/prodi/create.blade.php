<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="/prodi" method="post">
        @csrf
        <div class="m-3">
            <h5>Form Pengisian Data Program Studi</h5>
            <label for="nama_prodi" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control" id="nama_prodi" placeholder="Masukkan Nama Prodi.." value={{old ('nama')}}>
             @error('nama_prodi')
            <div class="text-danger">{{ $message }}</div>

            <label for="singkatan" class="form-label">Singkatan Prodi</label>
            <input type="text" class="form-control" id="singkatan" placeholder="Masukkan Singkatan Prodi.." value={{old ('nama')}}>
             @error('singkatan')
            <div class="text-danger">{{ $message }}</div>

            <label for="kaprodi" class="form-label">Nama Kaprodi</label>
            <input type="text" class="form-control" id="kaprodi" placeholder="Masukkan Nama Kaprodi.." value{{old ('nama')}}>
             @error('kaprodi')
            <div class="text-danger">{{ $message }}</div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </form>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 
</body>

</html>