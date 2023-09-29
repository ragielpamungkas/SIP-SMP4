<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = new Pengembalian();
        $data = ['pengembalian' => $pengembalian->allData()];
        return view('Pengembalian.pengembalian', $data);
    }

    public function tambahkembalian(Request $request)
    {
        $post = $request->all();

        $query = DB::table('tb_peminjaman')
            ->where('id_peminjaman', '=', $post['id_peminjaman'])
            ->update([
                'status' => 'Dikembalikan',
                'tgl_kembali' => date('Y-m-d'),
                'denda' => $post['denda'],
            ]);

        $datapeminjaman = DB::table('tb_peminjaman')->where('id_peminjaman','=',$post['id_peminjaman'])->get();

        foreach($datapeminjaman as $peminjaman)
        {
            foreach(unserialize($peminjaman->id_buku) as $idbuku)
            {
                $updatestokbuku = DB::update("UPDATE tb_buku SET tb_buku.jumlah = tb_buku.jumlah + 1 WHERE tb_buku.id_buku ='".$idbuku."'");
            }
        }

        return redirect()->route('pengembalian');
    }
}
