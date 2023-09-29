<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Model
{
    protected $table = "tb_pengguna";

    use HasFactory;

    public function allData()
    {
        return DB::table('tb_pengguna')
            ->join('tb_user', 'tb_user.id_pengguna', '=', 'tb_pengguna.id_pengguna')
            ->get();
    }
}
