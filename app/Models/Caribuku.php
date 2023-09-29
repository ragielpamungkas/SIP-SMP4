<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caribuku extends Model
{
    use HasFactory;

    protected $table = 'tb_buku';
    
    public function allData()
    {
        
        return DB::table('tb_buku')
        ->join('tb_rak', 'tb_rak.id_rak', '=', 'tb_buku.id_rak')
        ->join('tb_kategori', 'tb_kategori.id_kategori', '=', 'tb_buku.id_kategori')
        ->get();
        
    }
}
