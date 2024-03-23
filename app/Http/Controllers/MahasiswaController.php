<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::filter(request(['search']))->orderBy('nim', 'desc')->paginate(5)->withQueryString();
        return view('mahasiswas.index', [
            'page' => 'mahasiswas',
            'mahasiswas' => $mahasiswas,
            'semua_mahasiswa' => Mahasiswa::all(),
            'mahasiswa_laki_laki' => Mahasiswa::where('gender', 'laki-laki'),
            'mahasiswa_perempuan' => Mahasiswa::where('gender', 'perempuan')
        ]);
    }

    public function create()
    {
        return view('mahasiswas.create', [
            'page' => 'mahasiswas',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim|numeric',
            'nama' => 'required|min:3',
            'alamat' => 'required|min:3',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'usia' => 'required|numeric',
        ]);

        Mahasiswa::create($validatedData);

        return redirect('/mahasiswas')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('mahasiswas.edit', [
            'page' => 'mahasiswas',
            'mahasiswa' => Mahasiswa::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        $request->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required|min:3',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'usia' => 'required|numeric',
        ]);

        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->gender = $request->gender;
        $mahasiswa->usia = $request->usia;
        $mahasiswa->save();

        return redirect('/mahasiswas')->with('success', 'Mahasiswa berhasil diperbarui');
    }


    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->delete();

        return back()->with('success', 'Mahasiswa berhasil dihapus');
    }
}
