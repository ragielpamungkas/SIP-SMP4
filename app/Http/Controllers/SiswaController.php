<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $query = Siswa::get();

        $data = [
            "siswa" => $query
        ];

        return view('Siswa.siswa', $data);
    }

    public function tambahsiswa()
    {
        return view('Siswa.tambahsiswa');
    }

    public function insertsiswa(Request $request)
    {
        $post = $request->all();

        Siswa::insert([
            "nisn" => $post["nisn"],
            "nama_siswa" => $post["nama_siswa"],
            "tempat_lahir" => $post["tempat_lahir"],
            "tanggal_lahir" => $post["tanggal_lahir"],
            "jenis_kelamin" => $post["jenis_kelamin"],
            "alamat" => $post["alamat"],
            "kelas" => $post["kelas"]
        ]);

        return redirect()->route('siswa');
    }

    public function editsiswa($id)
    {
        $data = Siswa::where('id_siswa',$id)->get();

        return view('Siswa.editsiswa')->with(["siswa" => $data]);
    }

    public function hapusdatasiswa(Request $request)
    {
      $idsiswa = $request->idsiswa;

      $query = Siswa::where('id_siswa',$idsiswa)->delete();

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
