@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('layouts/sidebar')
    </div>
    <div class="col-md-8">
        <div class="text-center">
            <img src="{{asset('photos/luluk.jpg')}}" class="rounded-circle" width="150" height="150">
        </div>
        <h2 class="text-center">Luluk Tigayani</h2>
        <br>
        <div class="card justify-content-center text-center">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center">Laporan Absensi Siswa - Desember</h4>
                </div>
                <div class="row">
                    <div class="col rounded m-4 p-2 bg-green">
                        <h5>Hadir</h5>
                        <p>18</p>
                    </div>
                    <div class="col rounded m-4 p-2 bg-green">
                        <h5>Alfa</h5>
                        <p>3</p>
                    </div>
                    <div class="col rounded m-4 p-2 bg-green">
                        <h5>Izin</h5>
                        <p>2</p>
                    </div>
                    <div class="col rounded m-4 p-2 bg-green">
                        <h5>Sakit</h5>
                        <p>4</p>
                    </div>
                    <div class="col rounded m-4 p-2 bg-green">
                        <h5>Terlambat</h5>
                        <p>4</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
