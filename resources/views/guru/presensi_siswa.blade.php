@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <section class="section">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>QR Code</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$jadwal->mapel->nama}}</td>
                                    <td>{{$jadwal->kelas->nama}}</td>
                                    <td><a href="/qrcode/{{$jadwal->id}}" class="btn btn-sm btn-outline-dark">QR
                                            Code</a></td>
                                    <td>
                                        @if($jadwal->status == 0)
                                        <span class="badge bg-primary">Selesai</span>
                                        @else
                                        <span class="badge bg-success">Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">Presensi Siswa</div>
                                <div class="col text-end"><a href="/presensi/siswa/{{$jadwal->id}}/tambah" class="btn btn-primary">Tambah Presensi</a></div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class='table table-striped' id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nomor Absen</th>
                                            <th>Jam</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($presensi as $data)
                                        <tr>
                                            <td>{{$data->siswa->nama}}</td>
                                            <td>{{$data->siswa->no_absen}}</td>
                                            <td>{{$data->jam}}</td>
                                            <td>{{$data->keterangan}}</td>
                                            <td>
                                                <a href="/presensi/siswa/{{$jadwal->id}}/hapus/{{$data->siswa->id}}" class="btn icon btn-danger"><i data-feather="trash"></i></a>
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
