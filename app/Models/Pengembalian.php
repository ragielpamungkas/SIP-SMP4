<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengembalian extends Model
{
    protected $table = 'tb_peminjaman';

    use HasFactory;

    public function allData()
    {
        return DB::table('tb_peminjaman')
        ->join('tb_siswa', 'tb_siswa.id_siswa', '=', 'tb_peminjaman.id_siswa')
        ->orderBy('tb_peminjaman.status', 'asc')
        ->get();
    } 
}
