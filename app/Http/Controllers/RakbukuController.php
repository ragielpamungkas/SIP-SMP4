<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakbukuController extends Controller
{
    public function index()
    {
        $query = Rak::get();

        $data = [
            "rak" => $query
        ];

        return view('Rak Buku.rakbuku', $data);
    }

    public function insertrak(Request $request)
    {   
        $post = $request->all();

        Rak::insert([
          "rak" => $post["rak"]
        ]);

        return redirect()->route('rakbuku');
    }

    public function editrak($id)
    {
        $post = Rak::where('id_rak',$id)->get();
        return back();
    }
    function updaterak(Request $request)
    {
        $post = $request->all();

        // dd($post);

        $query = Rak::where('id_rak',$post['id_rak'])->update([
        "rak" => $post["rak"],
        ]);

        return back();
    }

    public function hapusdatarak(Request $request)
    {
      $idrak = $request->idrak;

      $query = Rak::where('id_rak',$idrak)->delete();

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
