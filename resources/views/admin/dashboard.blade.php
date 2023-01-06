@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Dashboard</h3>
        </div>
        <section class="section">
            <div class="row mb-2">
                <div class="col-12 col-md-4">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <div class="px-3 py-3 justify-content-between">
                                    <h3 class="card-title mb-4">Jumlah Guru</h3>
                                    <h1 class="text-white fw-bold">{{$guru}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <div class="px-3 py-3 justify-content-between">
                                    <h3 class="card-title mb-4">Jumlah Siswa</h3>
                                    <h1 class="text-white fw-bold">{{$siswa}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <div class="px-3 py-3 justify-content-between">
                                    <h3 class="card-title mb-4">Jumlah Kelas</h3>
                                    <h1 class="text-white fw-bold">{{$kelas}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
