<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporansiswaController extends Controller
{
    public function index()
    {
        return view('Petugas.laporansiswa');
    }
}
