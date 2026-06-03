<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // akses model Periode
        $period = Period::all(); // select*from periode
        //dd($result);
        // kirim data periode ke view
        return view ('periode.index', compact('period'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $data = $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
        ]);

        Period::create($data);

        return redirect()->route('periode.index')->with('success', 'Data Periode Berhasil Ditambahkan!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Period $period)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Period $period)
    {
        //dd(%period);
        $input = $request->validate([
            'tahun_akademik' => "required|unique:periods,tahun_akademik,".$period->id,
            'kode_smt' => 'required',
        ]);
        $period->update($input);
        return redirect()->route('periode.index')->with('success', 'Data Periode Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period)
    {
        // $period = Period::find($period);
        // dd($period);
        $period->delete(); //delete form
        return redirect()->route('periode.index')->with('success','Data Periode Berhasil Terhapus!'); //redirect ke halaman index periode
    }
}
