@extends('layouts.main')
@section('content')
    <div class="row justify-content-center align-items-center" style="height: 10rem">
        <div class="col-5 text-center">
            <h1 class="fw-light">HALAMAN ADMIN</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 mb-3">
            <form action="/mahasiswas" method="get" class="d-flex gap">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari nama..."
                        aria-describedby="search" autocomplete="off" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit" id="search">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="fw-light">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-12 mb-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="bg-dark text-light">#</th>
                        <th scope="col" class="bg-dark text-light">NIM</th>
                        <th scope="col" class="bg-dark text-light">Nama</th>
                        <th scope="col" class="bg-dark text-light">Alamat</th>
                        <th scope="col" class="bg-dark text-light">Tanggal lahir</th>
                        <th scope="col" class="bg-dark text-light">Gender</th>
                        <th scope="col" class="bg-dark text-light">Usia</th>
                        <th class="bg-dark text-light text-end">
                            <a href="/mahasiswas/create" class="btn btn-sm btn-primary">
                                Tambah
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->alamat }}</td>
                            <td>{{ $mahasiswa->tanggal_lahir }}</td>
                            <td>{{ $mahasiswa->gender }}</td>
                            <td>{{ $mahasiswa->usia }}</td>
                            <td class="d-flex gap-1 justify-content-end">
                                <a href="/mahasiswas/{{ $mahasiswa->id }}/edit" class="btn btn-sm btn-warning">Ubah</a>
                                <form action="/mahasiswas/{{ $mahasiswa->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        onclick="return confirm('Hapus data mahasiswa ( {{ $mahasiswa->nama . ' - ' . $mahasiswa->nim }})')"
                                        type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($mahasiswas->count() <= 0)
                        <tr>
                            <th colspan="8" class="text-center">Data mahasiswa tidak ditemukan</th>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            {{ $mahasiswas->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
