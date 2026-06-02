@extends('main')

@section('title', 'Tambah Periode')

@section('content')


    <form action="{{ route('periode.store')}}" method="post">
        <a href="{{('periode.index')}}" class="btn btn-primary mb-3">Kembali</a>
        @csrf
        <div class="m-3">
            <h5>Form Pengisian Data Periode</h5>
            <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
            <input name="tahun_akademik" type="text" class="form-control" id="tahun_akademik" placeholder="Masukkan Tahun Akademik.." value={{old ('tahun_akademik')}}>
            @error('tahun_akademik')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <label for="semester" class="form-label">Kode Semester</label>
            <select class="form-select" name="semester" id="semester" required>
               <option value="" disabled selected>Pilih Kode Semester</option>
               <option value="1" {{ old('semester') == '1' ? 'selected' : ''}}>Ganjil</option>
               <option value="1" {{ old('semester') == '1' ? 'selected' : ''}}>Genap</option>
             </select>
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