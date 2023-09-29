<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoribukuController extends Controller
{
    public function index()
    {
        $query = Kategori::get();

        $data = [
            "kategori" => $query
        ];

        return view('Kategori Buku.kategoribuku', $data);
    }

    public function insertkategori(Request $request)
    {   
        $post = $request->all();

        Kategori::insert([
          "kategori" => $post["kategori"]
        ]);

        return redirect()->route('kategoribuku');
    }

    public function editkategori($id)
    {
        $post = Kategori::where('id_kategori',$id)->get();

        // echo json_encode($post);
        return back();
    }
    function updatekategori(Request $request)
    {
        $post = $request->all();

        // dd($post);

        $query = Kategori::where('id_kategori',$post['id_kategori'])->update([
        "kategori" => $post["kategori"],
        ]);

        return back();
    }

    public function hapusdatakategori(Request $request)
    {
      $idkategori = $request->idkategori;

      $query = Kategori::where('id_kategori',$idkategori)->delete();

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
