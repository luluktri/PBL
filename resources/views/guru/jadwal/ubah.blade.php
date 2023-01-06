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
                            <form class="form form-horizontal" action="/jadwal/update/{{$jadwal->id}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1" {{($jadwal->status == 1) ? 'checked':''}}>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0" {{($jadwal->status == 0) ? 'checked':''}}>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Selesai
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Mapel</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="choices form-select" name="mapel_id" required>
                                                @foreach ($mapel as $data)
                                                <option  value="{{$data->id}}" {{($jadwal->mapel_id == $data->id) ? 'selected':''}}>{{$data->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kelas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="choices form-select" name="kelas_id" required>
                                                @foreach ($kelas as $data)
                                                <option  value="{{$data->id}}" {{($jadwal->kelas_id == $data->id) ? 'selected':''}}>{{$data->nama}}</option>
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
