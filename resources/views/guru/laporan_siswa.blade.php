@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('layouts/sidebar')
    </div>
    <div class="col-md-8">
        <h4 class="text-center">Laporan Absensi Siswa - Desember</h4>
        <table class="table table-success table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Luluk</td>
                    <td>12A</td>
                    <td><a href="/laporan_detail">Lihat</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Andini</td>
                    <td>12A</td>
                    <td><a href="/laporan_detail">Lihat</a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Aura</td>
                    <td>12A</td>
                    <td><a href="/laporan_detail">Lihat</a></td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Fitri</td>
                    <td>12A</td>
                    <td><a href="/laporan_detail">Lihat</a></td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Nada</td>
                    <td>12A</td>
                    <td><a href="/laporan_detail">Lihat</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
