<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi');
    }

    public function inputregistrasi(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns|unique:tb_user',
            'password' => 'required|min:5|max:255',
            'level' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Registrasi::create($validatedData);

        return redirect('login');
    }
}
