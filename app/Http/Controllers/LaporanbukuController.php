<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanbukuController extends Controller
{
    public function index()
    {
        return view('Petugas.laporanbuku');
    }
}
