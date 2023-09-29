<?php

namespace App\Models;

use App\Models\Rak;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Databuku extends Model
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

    //caribuku
    public function kategori()
    {
        return $this->hasMany(Kategori::class, 'id_kategori','id_kategori');
    }

    public function rak()
    {
        return $this->hasMany(Rak::class, 'id_rak','id_rak');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class,'id_buku','id_buku');
    }
}
