<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;

class DashboardController extends Controller
{
    public function index()
    {
        $siswasCount = Siswa::count();
        $gurusCount = Guru::count();
        $kelasCount = Kelas::count();
        $mapelsCount = Mapel::count();

        $latestSiswas = Siswa::with('kelas')->latest()->take(3)->get();
        $latestNilais = Nilai::with(['siswa', 'mapel'])->latest()->take(3)->get();

        return view('dashboard', compact(
            'siswasCount', 
            'gurusCount', 
            'kelasCount', 
            'mapelsCount', 
            'latestSiswas', 
            'latestNilais'
        ));
    }
}
