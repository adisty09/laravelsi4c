<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //DB
        $jumlahMahasiswa = DB::select('select nama, count(*) as jumlah
from mahasiswas 
join prodis on prodi_id = prodis.id
group by nama;
');

$angkatanData = collect(DB::select('
select left (npm,2) as angkatan, count(*) as total
from mahasiswas
group by left(npm,2)'));

        return view('dashboard', compact('jumlahMahasiswa', 'angkatanData'));
    }

}
