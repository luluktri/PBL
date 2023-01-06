@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title row mb-4">
            <div class="col">
                <h3>Data Siswa</h3>
            </div>
            <div class="col text-end">
                <a href="/siswa/tambah" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        <section class="section">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class='table table-striped' id="table1">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>No Absen</th>
                                            <th>Kelas</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nomor HP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $siswa)
                                        <tr>
                                            <td>{{$siswa->nis}}</td>
                                            <td>{{$siswa->nama}}</td>
                                            <td>{{$siswa->no_absen}}</td>
                                            <td>{{$siswa->kelas->nama}}</td>
                                            <td>{{$siswa->user->email}}</td>
                                            <td>{{$siswa->alamat}}</td>
                                            <td>{{$siswa->tanggal_lahir}}</td>
                                            <td>{{$siswa->no_telepon}}</td>
                                            <td>
                                                <a href="/siswa/ubah/{{$siswa->id}}" class="btn icon btn-warning"><i data-feather="edit"></i></a>
                                                <a href="/siswa/hapus/{{$siswa->id}}" class="btn icon btn-danger"><i data-feather="trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
