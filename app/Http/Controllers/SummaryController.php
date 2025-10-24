<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaUjikom;

class SummaryController extends Controller
{
    /**
     * Menampilkan rangkuman data siswa
     */
    public function index()
    {
        // Hitung jumlah siswa berdasarkan jenis kelamin
        $jumlahLaki = SiswaUjikom::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlahPerempuan = SiswaUjikom::where('jenis_kelamin', 'Perempuan')->count();

        // Hitung jumlah siswa berdasarkan kelas (X, XI, XII)
        $jumlahX = SiswaUjikom::where('kelas', 'X')->count();
        $jumlahXI = SiswaUjikom::where('kelas', 'XI')->count();
        $jumlahXII = SiswaUjikom::where('kelas', 'XII')->count();

        // Kirim data ke view
        return view('rangkuman.index', compact(
            'jumlahLaki',
            'jumlahPerempuan',
            'jumlahX',
            'jumlahXI',
            'jumlahXII'
        ));
    }
}
