@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title row mb-4">
            <div class="col">
                <h3>Data Kelas</h3>
            </div>
            <div class="col text-end">
                <a href="/kelas/tambah" class="btn btn-primary">Tambah Data</a>
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
                                            <th>Nomor</th>
                                            <th>Nama Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $kelas)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$kelas->nama}}</td>
                                            <td>
                                                <a href="/kelas/ubah/{{$kelas->id}}" class="btn icon btn-warning"><i data-feather="edit"></i></a>
                                                <a href="/kelas/hapus/{{$kelas->id}}" class="btn icon btn-danger"><i data-feather="trash"></i></a>
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
