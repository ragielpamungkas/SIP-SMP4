<?php

namespace App\Http\Controllers;

use App\Models\Databuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaribukuController extends Controller
{
    public function index()
    {
        $datapeminjaman = DB::table('tb_peminjaman')
            ->where('status', '=', 'Belum Dikembalikan')
            ->get();
        $query = Databuku::with(['kategori', 'rak'])->get();

        $data = [];

        foreach ($datapeminjaman as $item) {
            foreach (unserialize($item->id_buku) as $idbuku) {
                $data[] = $idbuku;
            }
        }

        sort($data);

        $countsamavalue = array_count_values($data);
        #end of count same value

        $jmlhpeminjamanarr = [];
        foreach ($query as $item ) {
        foreach ($countsamavalue as $idbuku => $count) {
                if ($item->id_buku== $idbuku) {
                    // echo $item['id_buku'];
                    $item['jumlahpeminjam'] = $countsamavalue[$item->id_buku];
                    // if (isset($countsamavalue[$item->id_buku])){
                    // }
                }
            }
            // echo $idbuku;
            // if ($countsamavalue[$item->id_buku]){
        }
        // }
        // echo json_encode($query);
        // foreach($countsamavalue as $key => $value)
        // {
        //     if ($query)
        //     $jmlhpeminjamanarr[] = $value;
        // }

        // dd($countsamavalue);

        return view('Siswa.caribuku', ['caribuku' => $query, 'jmlhpeminjamanarr' => $jmlhpeminjamanarr]);
    }
}
