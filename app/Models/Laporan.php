<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    protected $table = 'tb_peminjaman';

    use HasFactory;

    public function allData()
    {
        return DB::select("select * from `tb_peminjaman` inner join tb_siswa on tb_siswa.id_siswa = tb_peminjaman.id_siswa");

    }
}
