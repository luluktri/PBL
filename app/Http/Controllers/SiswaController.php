<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();
        return view('admin.siswa.index', compact('data'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.tambah', compact('kelas'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'siswa',
        ]);

        $foto_path = null;

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/siswa/';
            $profileImage = $request->nama . "-" .date('Ymd') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $foto_path = $destinationPath."$profileImage";
        }

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'no_absen' => $request->no_absen,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'user_id' => $user->id,
            'foto' => $foto_path,
        ]);

        return redirect('/siswa');
    }

    public function edit($id)
    {
        $data = Siswa::find($id);
        $kelas = Kelas::all();
        return view('admin.siswa.ubah', compact('data', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $guru = Siswa::find($id);
        if ($request->password != null) {
            $user = User::whereId($guru->user->id)->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        $foto_path = null;

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/siswa/';
            $profileImage = $request->nama . "-" .date('Ymd') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $foto_path = $destinationPath."$profileImage";
        }

        Siswa::whereId($id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'no_absen' => $request->no_absen,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'foto' => $foto_path,
        ]);

        return redirect('/siswa');

    }

    public function destroy($id)
    {
        //
    }
}
