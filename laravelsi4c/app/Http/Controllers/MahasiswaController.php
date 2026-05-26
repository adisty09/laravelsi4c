<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

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
            $filename = $request->npm. '.'. $request->file('foto')->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('mahasiswa', $filename, 'public');
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
    public function show(Mahasiswa $mhs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mhs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mhs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mhs)
    {
        //
    }
}

