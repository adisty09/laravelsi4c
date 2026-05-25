<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //akses model fakultas
        $fakultas= Fakultas::all(); //select * from fakultas
        //dd($result); //dump data
        //kirim data fakultas ke view menggunakan with
        // return view ('fakultas.index') -> with ('fakultas', $result);
        // atau compact
        return view ('fakultas.index', compact('fakultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi sata
        $input = $request->validate([
            'nama' => 'required',
            'singkatan' => 'required',
            'dekan' => 'required'
        ]);

        //simpan data ke tabel fakultas
        Fakultas::create($input);

        //redirect ke halaman index fakultas
        return redirect()->route('fakultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $fakultas)
    {
        
        $fakultas = Fakultas::find($fakultas); // select*form
        //fakultas where id = $fakultas
        //dd(Sfakultas);
        return view('fakultas.edit', compact('fakultas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //dd($fakultas);
        //validasi data
        $input = $request->validate([
            'nama' => 'requaired|unique:fakultas,nama,'
            .$fakultas->id, //validasi nama harus unik sitabel fakultas kecuali
            //data yang sedang diupdate
            'singkatan' => 'requaired',
            'dekan' => 'requaired'
        ]);

        //update data ke tabel fakultas
        $fakultas ->update($input);
        //redirect ke halaman inde fakultas
        return redirect()->route('fakultas.index')->with('success', 'Data Fakultas Berhasil Diupdate!');
        //redirect ke halaman index fakultas dengan pesan success
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fakultas)
    {
        $fakultas = Fakultas::find($fakultas);
        //dd($fakultas);
        $fakultas->delete(); //delete form
        
        return redirect()->route('fakultas.index')
        ->with('success','Data fakultas berhasil dihapus'); //redirect ke halaman index fakultas
    }
}
