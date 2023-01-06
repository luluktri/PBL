@extends('layouts.app')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <section class="section">
            <button id="scanqr" class="btn icon icon-left btn-lg btn-primary"><i data-feather="plus-circle"></i> Scan QR
                Code</button>
            <div class="row my-4" id="scanner-canvas">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <video id="preview"></video>
                    </div>
                    <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                        </label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Presensi Hari Ini</div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class='table table-striped' id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Jadwal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($presensi as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>{{$data->jam}}</td>
                                            <td>{{$data->jadwal->mapel->nama}}</td>
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
<script src="{{asset('assets/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/vendors/instascan/instascan.min.js')}}"></script>
<script type="text/javascript">
    $('#scanner-canvas').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#scanqr').click(function () {
        $('#scanner-canvas').show();
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (code) {
            $.ajax({
                url: `presensi/${code}`,
                type: 'post',
                data: {
                    'siswa_id': '{{$siswa->id}}',
                    '_token': '{{csrf_token()}}'
                },
                success: function (response) {
                    window.location.reload();
                    alert(response.message)
                },
                error: function (response) {
                    alert(response.message)
                }
            });
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);

                $('[name="options"]').on('change', function () {
                    if ($(this).val() == 1) {
                        if (cameras[0] != "") {
                            scanner.start(cameras[0]);
                        } else {
                            alert('No Front camera found!');
                        }
                    } else if ($(this).val() == 2) {
                        if (cameras[1] != "") {
                            scanner.start(cameras[1]);
                        } else {
                            alert('No Back camera found!');
                        }
                    }
                });
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    });
</script>
<!--
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan', function (content) {
        alert(content);
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
            $('[name="options"]').on('change', function () {
                if ($(this).val() == 1) {
                    if (cameras[0] != "") {
                        scanner.start(cameras[0]);
                    } else {
                        alert('No Front camera found!');
                    }
                } else if ($(this).val() == 2) {
                    if (cameras[1] != "") {
                        scanner.start(cameras[1]);
                    } else {
                        alert('No Back camera found!');
                    }
                }
            });
        } else {
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
        alert(e);
    });
</script> -->
@endsection
