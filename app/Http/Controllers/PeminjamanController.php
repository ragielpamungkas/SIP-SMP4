<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $databuku = [];
        $getdatabuku = DB::table('tb_peminjaman')
            ->join('tb_siswa', 'tb_siswa.id_siswa', '=', 'tb_peminjaman.id_siswa')
            ->get();

        $idbuku = [];

        foreach ($getdatabuku as $item) {
            foreach (unserialize($item->id_buku) as $data) {
                $idbuku[] = $data;
            }
        }

        $namabuku = [];
        for ($i = 0; $i < count($idbuku); $i++) {
            $querynamabuku = DB::table('tb_buku')->where('id_buku', '=', $idbuku[$i])->get();
            foreach ($querynamabuku as $item) {
                $namabuku[] = $item->judul."<br>";
            }
        }
        
        $databuku = [
            "alldatabuku" => $getdatabuku,
            "namabuku" => $namabuku
        ];

        return view('Peminjaman.peminjaman', $databuku);
    }

    public function __construct()
    {
        $this->Peminjaman = new Peminjaman();
    }

    public function tambahpinjam()
    {
        $date = date('ymdhms');
        $datestring = (string) $date;
        $mergedate = 'PN' . $datestring . rand(0, 100);

        //databuku
        $databuku = DB::table('tb_buku')->where('jumlah','>','0')->get();
        $nisn = DB::table('tb_siswa')->get();
        $namapem = DB::table('tb_siswa')->get();

        return view('Peminjaman.tambahpinjam')->with([
            'randomnumber' => $mergedate,
            'judbuk' => $databuku,
            'nisnsiswa' => $nisn,
            'namapeminjam' => $namapem,
        ]);
    }

    public function insertpinjam(Request $request)
    {
        $post = $request->all();
        $idbuku = serialize($post['idbuku']);

        Peminjaman::insert([
            'id_peminjaman' => $post['id_peminjaman'],
            'id_siswa' => $post['id_siswa'],
            'id_buku' => $idbuku,
            'tgl_peminjaman' => $post['tgl_peminjaman'],
            'lama_peminjaman' => $post['lama_peminjaman'],
            'tgl_balik' => $post['tgl_balik']
        ]);


        for($i=0; $i < count($post['idbuku']); $i++)
        {
            $query = DB::update("UPDATE tb_buku SET tb_buku.jumlah =  tb_buku.jumlah - 1 WHERE tb_buku.id_buku = '".$post['idbuku'][$i]."'");
        }
        
        return redirect()->route('peminjaman');
    }

    public function cariNISN(Request $request)
    {
        $nisn = $request->nisn;
        $query = DB::select('SELECT * FROM tb_siswa WHERE tb_siswa.nisn = "' . $nisn . '"');

        $resulttext = "";
        #Check Peminjaman
        foreach ($query as $item)
        {
            $datapeminjaman = DB::table('tb_peminjaman')->where('id_siswa','=',$item->id_siswa)->where('status','=','Belum Dikembalikan')->get();
            
            // dd($datapeminjaman);
            if($datapeminjaman->isEmpty())
            {
                $resulttext = "Success"; 
            }
            else
            {
                $resulttext = "Failed"; 
            }


        }

        $result = [
            "datasiswa" => $query,
            "resulttext" => $resulttext
        ];
        // dd($result);
        echo json_encode($result);
    }

    public function hapusdatapinjam(Request $request)
    {
        $idpeminjaman = $request->idpeminjaman;

        $query = Peminjaman::where('id_peminjaman', $idpeminjaman)->delete();

        if ($query) {
            $result = [
                'result' => 'Success',
                'msg' => 'Sukses Menghapus',
            ];

            echo json_encode($result);
        } else {
            $result = [
                'result' => 'Failed',
                'msg' => 'Gagal Menghapus',
            ];

            echo json_encode($result);
        }
    }

    public function detailpinjam($id)
    {
        $data = DB::select(
            "SELECT *,if(datediff(now(),tb_peminjaman.tgl_balik)>0,datediff(now(),tb_peminjaman.tgl_balik)*500,null) as hargadenda  FROM `tb_peminjaman`
      INNER JOIN tb_siswa on tb_siswa.id_siswa = tb_peminjaman.id_siswa
      where tb_peminjaman.id_peminjaman = '" .
                $id .
                "'",
        );

        $databuku = DB::table('tb_buku')->get();
        $nisn = DB::table('tb_siswa')->get();
        $namapem = DB::table('tb_siswa')->get();
        // ["siswa" => $data]
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        //  die;
        // dd($data);
        return view('Peminjaman.detailpinjam')->with(['peminjaman' => $data, 'judbuk' => $databuku, 'nisnsiswa' => $nisn, 'namapeminjam' => $namapem]);
    }

    public function cekpeminjaman(Request $request)
    {
        $post = $request->all();

        $query = DB::table('tb_peminjaman')->where('id_siswa', $post['idsiswa'])->where('status','=','Belum Dikembalikan')->get();

        $data = [];

        foreach ($query as $item) {
            foreach (unserialize($item->id_buku) as $idbuku) {
                $data[] = $idbuku;
            }
        }

        sort($data);

        $returntext = "";
        $result = "";

        if(in_array($post['idbuku'], $data))
        {
            $returntext = "Buku Sedang Dipinjam!";
            $result = "Gagal";
        }
        else
        {
            $returntext = "Buku Dapat Dipinjam!";
            $result = "Sukses";
        }

        $result = [
            "result" => $result,
            "msg" => $returntext
        ];

        echo json_encode($result);
    }
}
