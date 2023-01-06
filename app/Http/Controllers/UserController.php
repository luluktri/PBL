<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        if ($user->role == 'guru') {
            $data = Guru::where('user_id', $user->id)->first();

            return view('guru.profile', compact('user', 'data'));

        } elseif ($user->role == 'siswa') {
            $data = Siswa::where('user_id', $user->id)->first();
            return view('siswa.profile', compact('user', 'data'));
        }
    }

    public function profile_ubah()
    {
        $user = Auth::user();
        if ($user->role == 'guru') {
            $data = Guru::where('user_id', $user->id)->first();

            return view('guru.profile_ubah', compact('user', 'data'));

        } elseif ($user->role == 'siswa') {
            $data = Siswa::where('user_id', $user->id)->first();

            return view('siswa.profile_ubah', compact('user', 'data'));
        }
    }

    public function profile_update_guru(Request $request, $id)
    {
        $guru = Guru::find($id);
        if ($request->password != null) {
            $user = User::whereId($guru->user->id)->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        $foto_path = $guru->foto;

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/guru/';
            $profileImage = $request->nama . "-" .date('Ymd') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $foto_path = $destinationPath."$profileImage";
        }

        Guru::whereId($id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'foto' => $foto_path,
        ]);

        return redirect('/profile');
    }

    public function profile_update_siswa(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        if ($request->password != null) {
            $user = User::whereId($siswa->user->id)->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        $foto_path = $siswa->foto;

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/siswa/';
            $profileImage = $request->nama . "-" .date('Ymd') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $foto_path = $destinationPath."$profileImage";
        }

        Siswa::whereId($id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'foto' => $foto_path,
        ]);

        return redirect('/profile');
    }
}
