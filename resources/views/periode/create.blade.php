@extends('main')

@section('title', 'Tambah Periode')

@section('content')
    <a href="{{ route('periode.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('periode.store') }}" method="post">
        @csrf
        <div class="m-3">
            <h5>Form Pengisian Data Periode</h5>
            <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
            <input name="tahun_akademik" type="text" class="form-control" id="tahun_akademik" placeholder="Masukkan Tahun Akademik.." value={{old ('tahun_akademik')}}>
            @error('tahun_akademik')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <label for="kode_smt" class="form-label">Kode Semester</label>
            <select class="form-select" name="kode_smt" id="kode_smt" required>
               <option value="" disabled selected>Pilih Kode Semester</option>
               <option value="1" {{ old('kode_smt') == '1' ? 'selected' : ''}}>Ganjil</option>
               <option value="2" {{ old('kode_smt') == '2' ? 'selected' : ''}}>Genap</option>
             </select>
            @error('kode_smt')
            <div class="text-danger">{{ $message }}</div>
                
            @enderror

            <button type="submit" class="btn btn-secondary mt-3">Simpan</button>
        </div>
    </form>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 
</body>

</html>
@endsection