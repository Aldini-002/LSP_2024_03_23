@extends('layouts.main')
@section('content')
    <div class="row justify-content-center align-items-center" style="height: 10rem">
        <div class="col-5 text-center">
            <h1 class="fw-light">HALAMAN HOME - LSP 2024</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 mb-3">
            <form action="/" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari nama..."
                        aria-describedby="search" autocomplete="off" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit" id="search">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-12 mb-3">
            <table class="table table-striped">
                <thead>
                    <tr class="rounded">
                        <th scope="col" class="bg-dark text-light">#</th>
                        <th scope="col" class="bg-dark text-light">NIM</th>
                        <th scope="col" class="bg-dark text-light">Nama</th>
                        <th scope="col" class="bg-dark text-light">Alamat</th>
                        <th scope="col" class="bg-dark text-light">Tanggal lahir</th>
                        <th scope="col" class="bg-dark text-light">Gender</th>
                        <th scope="col" class="bg-dark text-light">Usia</th>
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
                        </tr>
                    @endforeach
                    @if ($mahasiswas->count() <= 0)
                        <tr>
                            <th colspan="7" class="text-center">Data mahasiswa tidak ditemukan</th>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            {{ $mahasiswas->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-12 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-3 text-center">Infomasi</h5>
                    <p class="card-text">Laki laki : <span
                            class="btn btn-sm btn-success">{{ $mahasiswa_laki_laki->count() }}</span></p>
                    <p class="card-text">Perempuan : <span
                            class="btn btn-sm btn-success">{{ $mahasiswa_perempuan->count() }}</span></p>
                    <h6 class="card-text">Total Mahasiswa : <span
                            class="btn btn-sm btn-success">{{ $semua_mahasiswa->count() }}</span></h6>
                </div>
            </div>
        </div>
    </div>
@endsection
