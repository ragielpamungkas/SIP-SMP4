<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $getdata = new Pengguna;
            $data = $getdata->allData();
            return view('Pengguna.pengguna')->with(["pengguna" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahpengguna()
    {
      $date = date("ymdhms");
      $datestring = (string)$date;
      $mergedate = "P".$datestring.rand(0,100);

      return view('Pengguna.tambahpengguna')->with([
        "randomnumber" => $mergedate
      ]);
    }


    public function insertdata(Request $request)
    {   
        $post = $request->all();

        // dd($post);

        //Table pengguna
        $query1 = Pengguna::insertGetId([
          // "id_pengguna" => $post["id_pengguna"],
          "nip" => $post["nip"],
          "nama" => $post["nama"],
          "tempat_lahir" => $post["tempat_lahir"],
          "tanggal_lahir" => $post["tanggal_lahir"],
          "alamat" => $post["alamat"],
          "jenis_kelamin" => $post["jenis_kelamin"]
        ]);
        
        //Table user
        $query2 =   DB::table('tb_user')->insert([
          // "id_user" => $post['id_user'],
          "id_pengguna" => $query1,
          "email" => $post["email"],
          "password" => bcrypt($post["password"]),
          "level" => $post["level"]
        ]);

        // Pengguna::create($request->all());
        return redirect()->route('pengguna');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editdata($id)
    {

      $data = Pengguna::join('tb_user', 'tb_user.id_pengguna', '=', 'tb_pengguna.id_pengguna')->where('tb_pengguna.id_pengguna',$id)->get();
      // $data_level = DB::select('SELECT * FROM `tb_user`');

      // echo json_encode($data_level);
      return view('Pengguna.editdata')->with(["pengguna" => $data]);
       
    }

    public function gantiPassword(Request $request)
    { 
      $post = $request->all();

      $query = DB::table('tb_user')->where('id','=',$post['id'])->update(["password" => bcrypt($post['password'])]);

      return back();
    }

    function updatedata(Request $request)
    {
      $post = $request->all();

      $query1 = Pengguna::where('id_pengguna',$post['id_pengguna'])->update([
       //Table pengguna
        "nip" => $post["nip"],
        "nama" => $post["nama"],
        "tempat_lahir" => $post["tempat_lahir"],
        "tanggal_lahir" => $post["tanggal_lahir"],
        "alamat" => $post["alamat"],
        "jenis_kelamin" => $post["jenis_kelamin"]
      ]);
      
      //Table user
      $query2 =   DB::table('tb_user')->insert([
        // "id_user" => $post['id_user'],
        "id_pengguna" => $query1,
        "email" => $post["email"],
        "password" => bcrypt($post["password"]),
        "level" => $post["level"]
      ]);
    
      return redirect()->route('pengguna');
    }

    public function hapusDataPengguna(Request $request)
    {
      $idpengguna = $request->idpengguna;

      $query = Pengguna::where('id_pengguna',$idpengguna)->delete();

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
