<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data mahasiswa beserta relasi prodi
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil data prodi untuk list dropdown
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'npm' =>'required|unique:mahasiswas,npm', //npm harus unik
            'nama'=> 'required',
            'prodi_id' =>'required',//prodi harus ada tabel prodis
            'foto' => 'nullable|image|max:2048', // optional foto, max 2MB
        ]);

        $data = $request->all();

        // upload file foto jika ada
        if ($request->hasFile('foto')){
            // rename file dengan npm untuk menghindari duplikasi nama
            $filename = $request->input('npm') . '.' . $request->file('foto')->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('mahasiswa', $filename, 'vercel_tmp');
            $data['foto'] = $path;
        } 

        // simpan data mahasiswa
        Mahasiswa::create($data);

        //redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasi Disimpan!');
        }
    

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //ambilsemua data prodi untuk list dropdown di form edit
        $prodi = Prodi::all();
        //kirim data mahasiswa dan prodi ke halaman view 
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        //validasi data
        $input = $request->validate([
            'nama' => 'required|unique:mahasiswas,nama,'
            .$mahasiswa->id, //validasi nama harus unik sitabel mahasiswas kecuali
            //data yang sedang diupdate
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'prodi_id' => 'required'
        ]);
        if ($request->hasFile('foto')) {
            //hapus file foto lama jika ada
            if ($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))) {
                unlink(storage_path('app/public/' . $mahasiswa->foto));
            }
            //upload file foto baru
            $filename = $request->npm . '.' . $request->file('foto')->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('mahasiswa', $filename, 'public');
            $input['foto'] = $path;
        }

        //update data ke tabel mahasiswa
        $mahasiswa ->update($input);
        //redirect ke halaman index mahasiswa
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Diupdate!');
        //redirect ke halaman index mahasiswa dengan pesan success
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //hapus file foto berdasarkan path yang tersimpan di database
        if ($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))){
            unlink(storage_path('app/public/' . $mahasiswa->foto));
        }
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Dihapus!');
    }
}

