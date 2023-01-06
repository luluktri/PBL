@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title row mb-4">
            <div class="col">
                <h3>Profile</h3>
            </div>
            <div class="col text-end">
                <a href="/profile/ubah" class="btn btn-primary">Ubah</a>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body text-center">
                    <div class="">
                        <img src="{{asset($data->foto)}}" class="rounded-circle" style="width: 100px; height: 100px;">
                    </div>
                    <div class="my-3">
                        <table class="table text-start">
                            <tr>
                                <td>NIS</td>
                                <td>: {{$data->nis}}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{$data->nama}}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>: {{$data->kelas->nama}}</td>
                            </tr>
                            <tr>
                                <td>Nomor Absen</td>
                                <td>: {{$data->no_absen}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: {{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{$data->alamat}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: {{$data->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>: {{$data->no_telepon}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
