@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title mb-4">
            <h3>Tambah Jadwal</h3>
        </div>
        <section class="section">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/jadwal/store" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Tanggal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" class="form-control" name="tanggal" value="{{date('Y-m-d')}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Mapel</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="choices form-select" name="mapel_id" required>
                                                @foreach ($mapel as $data)
                                                <option  value="{{$data->id}}">{{$data->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kelas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="choices form-select" name="kelas_id" required>
                                                @foreach ($kelas as $data)
                                                <option  value="{{$data->id}}">{{$data->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
