<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanpengembalianController extends Controller
{
    public function index()
    {
        return view('Petugas.laporanpengembalian');
    }
}
