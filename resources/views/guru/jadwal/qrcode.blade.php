@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title mb-4">
            <h3>QR Code Generator</h3>
        </div>
        <section class="section">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{$qrcode}}">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Guru</th>
                                        <td>{{$jadwal->guru->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>Mapel</th>
                                        <td>{{$jadwal->mapel->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>{{$jadwal->kelas->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if($jadwal->status == 0)
                                            <span class="badge bg-primary">Selesai</span>
                                            @else
                                            <span class="badge bg-success">Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
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
