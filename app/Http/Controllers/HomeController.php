<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $query['databuku']=DB::select('SELECT count(tb_buku.judul) as jumlah from tb_buku');
        $query['datasiswa']=DB::select('SELECT count(tb_siswa.nama_siswa) as jumlah from tb_siswa');
        $query['datapeminjaman'] = DB::select('SELECT COUNT(tb_peminjaman.id_peminjaman) as jumlah FROM `tb_peminjaman` where tb_peminjaman.status = "Belum Dikembalikan"');
        $query['datapengembalian'] = DB::select('SELECT COUNT(tb_peminjaman.id_peminjaman) as jumlah FROM `tb_peminjaman` where tb_peminjaman.status = "Dikembalikan"');

        return view('dashboard.master',$query);
    }
}
