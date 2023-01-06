<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Siswa;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function presensi(Request $request, $code)
    {
        $jadwal = Jadwal::where('code', $code)->first();
        $siswa = Siswa::find($request->siswa_id);
        if ($jadwal->kelas_id == $siswa->kelas_id && $jadwal->status == '1') {
            $presensi = Presensi::where('jadwal_id', $jadwal->id)->where('siswa_id', $siswa->id)->first();
            if (!$presensi) {
                $presensi = Presensi::create([
                    'tanggal' =>  Carbon::today(),
                    'jam' => Carbon::now(),
                    'siswa_id' => $request->siswa_id,
                    'jadwal_id' => $jadwal->id,
                    'keterangan' => 'Hadir'
                ]);
                return response()->json(['message' => 'Berhasil Presensi.'], 200);
            } else {
                return response()->json(['message' => 'Sudah Presensi.'], 200);
            }
        } else {
            return response()->json(['message' => 'Tidak ada jadwal atau Siswa'], 200);
        }

    }

    public function presensi_siswa($id)
    {
        $jadwal = Jadwal::find($id);
        $presensi = Presensi::where('jadwal_id', $jadwal->id)->get();
        return view('guru.presensi_siswa', compact('jadwal', 'presensi'));
    }

    public function presensi_siswa_tambah($id)
    {
        $jadwal = Jadwal::find($id);
        $siswa = Siswa::where('kelas_id', $jadwal->kelas_id)->get();
        return view('guru.presensi_siswa_tambah', compact('jadwal', 'siswa'));
    }

    public function presensi_siswa_store(Request $request, $id)
    {
        $jadwal = Jadwal::whereId($id)->first();
        $siswa = Siswa::find($request->siswa_id);

        $presensi = Presensi::where('jadwal_id', $jadwal->id)->where('siswa_id', $siswa->id)->first();
        if (!$presensi) {
            $presensi = Presensi::create([
                'tanggal' =>  Carbon::today(),
                'jam' => Carbon::now(),
                'siswa_id' => $siswa->id,
                'jadwal_id' => $jadwal->id,
                'keterangan' => $request->keterangan
            ]);
        }
        return redirect('/presensi/siswa/'.$jadwal->id);
    }

    public function presensi_siswa_hapus($jadwal_id, $id)
    {
        $presensi = Presensi::where('jadwal_id', $jadwal_id)->where('siswa_id', $id)->delete();
        return redirect('presensi/siswa/'.$jadwal_id);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presensi $presensi)
    {
        //
    }
}
