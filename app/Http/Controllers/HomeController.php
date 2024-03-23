<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::filter(request(['search']))->orderBy('nim', 'desc')->paginate(5)->withQueryString();
        return view('home', [
            'page' => 'home',
            'mahasiswas' => $mahasiswas,
            'semua_mahasiswa' => Mahasiswa::all(),
            'mahasiswa_laki_laki' => Mahasiswa::where('gender', 'laki-laki'),
            'mahasiswa_perempuan' => Mahasiswa::where('gender', 'perempuan')
        ]);
    }
}
