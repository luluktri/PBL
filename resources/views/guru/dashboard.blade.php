@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <section class="section">
            <a href="/jadwal/tambah" class="btn icon icon-left btn-lg btn-primary"><i data-feather="plus-circle"></i> Buat Jadwal</a>
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Jadwal Hari Ini</div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class='table table-striped' id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>QR Code</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwal as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->mapel->nama}}</td>
                                            <td>{{$data->kelas->nama}}</td>
                                            <td><a href="/qrcode/{{$data->id}}" class="btn btn-sm btn-outline-dark">QR Code</a></td>
                                            <td>
                                                @if($data->status == 0)
                                                <span class="badge bg-primary">Selesai</span>
                                                @else
                                                <span class="badge bg-success">Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/presensi/siswa/{{$data->id}}" class="btn icon btn-primary"><i data-feather="eye"></i></a>
                                                <a href="/jadwal/ubah/{{$data->id}}" class="btn icon btn-warning"><i data-feather="edit"></i></a>
                                                <a href="/jadwal/hapus/{{$data->id}}" class="btn icon btn-danger"><i data-feather="trash"></i></a>
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
