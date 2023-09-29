<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Laporan;
use App\Models\Databuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // echo "Test";
        $data = ['laporan' => $this->Laporan->allData()];
        return view('Petugas.laporansim', $data);
    }
    public function __construct()
    {
        $this->Laporan = new Laporan();
    }

    public function printLaporanSiswa()
    {
        $query['datasiswa'] = Siswa::get();
        return view('Print.printlaporansiswa', $query);
    }

    public function printLaporanBuku()
    {
        $query['databuku'] = DB::select("SELECT tb_buku.judul, tb_rak.rak, tb_buku.jumlah, tb_kategori.kategori, tb_buku.penulis, tb_buku.penerbit, tb_buku.tahun, tb_peminjaman.id_peminjaman FROM tb_buku
        INNER JOIN tb_kategori on tb_kategori.id_kategori = tb_buku.id_kategori
        INNER JOIN tb_rak on tb_rak.id_rak = tb_buku.id_rak
        LEFT JOIN tb_peminjaman on tb_peminjaman.id_buku = tb_buku.id_buku
        group by tb_buku.id_buku");

        $datapeminjaman = DB::table('tb_peminjaman')
            ->get();

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
        foreach ($countsamavalue as $key => $value) {
            $jmlhpeminjamanarr[] = $value;
        }

        $query['jmlhpeminjamanarr'] = $jmlhpeminjamanarr;

        // dd($query);

        return view('Print.printlaporanbuku', $query);
    }

    public function printLaporanPeminjaman(Request $request)
    {
        $post = $request->all();

        $data['bulanlaporan'] = $post['bulanlaporan'];
        $bulan = explode('-', $post['bulanlaporan']);

        $data['datapeminjaman'] = DB::select(
            "select tb_siswa.nama_siswa, tb_peminjaman.id_buku, tb_peminjaman.tgl_peminjaman, tb_peminjaman.id_buku, tb_peminjaman.tgl_balik, tb_peminjaman.lama_peminjaman from tb_peminjaman
        inner join tb_siswa on tb_siswa.id_siswa = tb_peminjaman.id_siswa
        where month(tb_peminjaman.tgl_peminjaman) = '" .
                $bulan[1] .
                "' and year(tb_peminjaman.tgl_peminjaman) = '" .
                $bulan[0] .
                "' AND tb_peminjaman.status = 'Belum Dikembalikan'",
        );

        return view('Print.printlaporanpeminjaman', $data);
    }

    public function printLaporanPengembalian(Request $request)
    {
        $post = $request->all();
        $data['bulanlaporan'] = $post['bulanlaporan'];
        $bulan = explode('-', $post['bulanlaporan']);

        $data['datapengembalian'] = DB::select("SELECT * FROM `tb_peminjaman` INNER JOIN tb_siswa on tb_peminjaman.id_siswa = tb_siswa.id_siswa  WHERE month(tb_peminjaman.tgl_kembali) = '" . $bulan[1] . "' and year(tb_peminjaman.tgl_kembali) = '" . $bulan[0] . "' and tb_peminjaman.status = 'Dikembalikan'");

        return view('Print.printlaporanpengembalian', $data);
    }
}
