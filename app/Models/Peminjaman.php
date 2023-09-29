<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    protected $table = 'tb_peminjaman';

    use HasFactory;

    public function allData()
    {
        DB::table('tb_peminjaman')
        ->join('tb_siswa', 'tb_siswa.id_siswa', '=', 'tb_peminjaman.id_siswa')
        ->get();

    }
}
