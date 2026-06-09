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
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:mahasiswas,npm', 
            'nama' => 'required',
            'prodi_id' => 'required',
            'foto' => 'nullable|image|max:2048', 
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $filename = $request->input('npm') . '.' . $file->getClientOriginalExtension();
            
            // Bypass menggunakan folder /tmp Vercel secara native
            $targetDir = '/tmp/storage/app/public/mahasiswa';
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            
            move_uploaded_file($file->getRealPath(), $targetDir . '/' . $filename);
            $data['foto'] = 'mahasiswa/' . $filename;
        } 

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Disimpan!');
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
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $input = $request->validate([
            'nama' => 'required|unique:mahasiswas,nama,' . $mahasiswa->id, 
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'prodi_id' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            // Hapus file foto lama di /tmp jika ada
            $oldFile = '/tmp/storage/app/public/' . $mahasiswa->foto;
            if ($mahasiswa->foto && file_exists($oldFile)) {
                unlink($oldFile);
            }

            $filename = $request->npm . '.' . $file->getClientOriginalExtension();
            
            // Simpan file baru ke /tmp secara native
            $targetDir = '/tmp/storage/app/public/mahasiswa';
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            
            move_uploaded_file($file->getRealPath(), $targetDir . '/' . $filename);
            $input['foto'] = 'mahasiswa/' . $filename;
        }

        $mahasiswa->update($input);
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $oldFile = '/tmp/storage/app/public/' . $mahasiswa->foto;
        if ($mahasiswa->foto && file_exists($oldFile)){
            unlink($oldFile);
        }
        
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Dihapus!');
    }
}
