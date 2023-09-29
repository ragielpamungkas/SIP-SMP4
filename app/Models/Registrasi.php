<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registrasi extends Model
{
    
    use HasFactory;
    
    protected $table = 'tb_user';

    protected $fillable= [
        'email',
        'password',
        'level'
    ];

    public $timestamps = false;
    
}
