<?php

namespace App\Http\Controllers;

use App\Models\Databuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = ['databuku' => $this->Databuku->allData(),];
            return view('Data Buku.databuku', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->Databuku = new Databuku();
    }

    public function tambahbuku()
    {
      // $
      $date = date("ymdhms");
      $datestring = (string)$date;
      $mergedate = "B".$datestring.rand(0,100);

      //Rak
      $datarak = DB::table('tb_rak')->get();

      //Kategori
      $datakategori = DB::table('tb_kategori')->get();
      
      return view('Data buku.tambahbuku')->with([
        "randomnumber" => $mergedate,
        "raks" => $datarak,
        "categories" => $datakategori
      ]);
    }


    public function insertbuku(Request $request)
    {   
        $post = $request->all();

        Databuku::insert([
          "id_buku" => $post["id_buku"],
          "id_rak" => $post["id_rak"],
          "id_kategori" => $post["id_kategori"],
          "judul" => $post["judul"],
          "penulis" => $post["penulis"],
          "penerbit" => $post["penerbit"],
          "tahun" => $post["tahun"],
          "jumlah" => $post["jumlah"]
        ]);

        // Pengguna::create($request->all());
        return redirect()->route('databuku');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editbuku($id)
    {

       //Rak
       $datarak = DB::table('tb_rak')->get();

       //Kategori
       $datakategori = DB::table('tb_kategori')->get();

      $data = Databuku::where('id_buku',$id)->get();

      // echo json_encode($datakategori);
      return view('Data buku.editbuku')->with(["databuku" => $data,"raks" => $datarak, "categories" => $datakategori]);
       
    }

    function updatebuku(Request $request)
    {
      $post = $request->all();

      $query = Databuku::where('id_buku',$post['id_buku'])->update([
        "id_buku" => $post["id_buku"],
        "id_rak" => $post["id_rak"],
        "id_kategori" => $post["id_kategori"],
        "judul" => $post["judul"],
        "penulis" => $post["penulis"],
        "penerbit" => $post["penerbit"],
        "tahun" => $post["tahun"],
        "jumlah" => $post["jumlah"]
      ]);

      return redirect()->route('databuku');
    }

    public function hapusdatabuku(Request $request)
    {
      $idbuku = $request->idbuku;

      $query = Databuku::where('id_buku',$idbuku)->delete();

      if($query)
      {
        $result = [
          "result" => "Success",
          "msg" => "Sukses Menghapus"
        ];

        echo json_encode($result);
      }
      else
      {
        $result = [
          "result" => "Failed",
          "msg" => "Gagal Menghapus"
        ];

        echo json_encode($result);
      }
    }
}