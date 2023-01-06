<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jadwal;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

class JadwalController extends Controller
{

    public function create()
    {
        $data = Jadwal::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('guru.jadwal.tambah', compact('data', 'mapel', 'kelas'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $code = Str::random(6);
        $jadwal = Jadwal::create([
            'tanggal' => $request->tanggal,
            'mapel_id' => $request->mapel_id,
            'kelas_id' => $request->kelas_id,
            'guru_id' => $user->id,
            'code' => $code,
            'status' => '1',
        ]);
        return redirect('/qrcode/'.$jadwal->id);
    }

    public function generateQrCode($code)
    {
        $qrcode = 'data:image/svg+xml;base64,'.base64_encode(QrCode::size(300)->style('round')->generate($code));
        return $qrcode;
    }

    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('guru.jadwal.ubah', compact('jadwal', 'mapel', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        Jadwal::find($id)->update([
            'mapel_id' => $request->mapel_id,
            'kelas_id' => $request->kelas_id,
            'status' => $request->status,
        ]);

        return redirect('/dashboard');

    }

    public function destroy($id)
    {
        Jadwal::whereId($id)->delete();
        return redirect('/kelas');
    }

    public function qrcode($id)
    {
        $jadwal = Jadwal::find($id);
        $qrcode = $this->generateQrCode($jadwal->code);
        // dd($qrcode);
        // dd($jadwal);
        return view('guru.jadwal.qrcode', compact('jadwal', 'qrcode'));
    }
}
