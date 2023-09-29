<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanpeminjamanController extends Controller
{
    public function index()
    {
        return view('Petugas.laporanpeminjaman');
    }
}
