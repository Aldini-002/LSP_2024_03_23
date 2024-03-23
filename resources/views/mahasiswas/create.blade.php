@extends('layouts.main')
@section('content')
    <div class="row justify-content-center align-items-center" style="height: 10rem">
        <div class="col-5 text-center">
            <h1 class="fw-light">HALAMAN TAMBAH MAHASISWA</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
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

        <div class="col-12"></div>

        <div class="col-6">
            <div class="card mb-5">
                <div class="card-body">
                    <form action="/mahasiswas" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="number" min="0" class="form-control" name="nim" placeholder="NIM..."
                                autocomplete="off" required value="{{ old('nim') }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama..."
                                autocomplete="off" required value="{{ old('nama') }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat..."
                                autocomplete="off" required value="{{ old('alamat') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal lahir..."
                                autocomplete="off" required value="{{ old('tanggal_lahir') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Gender</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender1"
                                        value="laki-laki"
                                        {{ request('gender') == 'laki-laki' ? 'checked' : '' }}{{ !request('gender') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender1">
                                        Laki laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender2"
                                        value="perempuan" {{ request('gender') == 'perempuan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="number" min="0" class="form-control" name="usia" placeholder="Usia..."
                                autocomplete="off" required value="{{ old('usia') }}">
                        </div>
                        <div class="text-end">
                            <a href="/mahasiswas" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
