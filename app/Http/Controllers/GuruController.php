<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $data = Guru::all();
        return view('admin.guru.index', compact('data'));
    }

    public function create()
    {
        // dd();
        return view('admin.guru.tambah');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'guru',
        ]);

        $foto_path = null;

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/guru/';
            $profileImage = $request->nama . "-" .date('Ymd') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $foto_path = $destinationPath."$profileImage";
        }

        Guru::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'user_id' => $user->id,
            'foto' => $foto_path,
        ]);

        return redirect('/guru');
    }

    public function edit($id)
    {
        $data = Guru::find($id);
        return view('admin.guru.ubah', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $guru = Guru::find($id);
        if ($request->password != null) {
            $user = User::whereId($guru->user->id)->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        $foto_path = null;

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

        return redirect('/guru');

    }

    public function destroy($id)
    {
        Guru::whereId($id)->delete();
        return redirect('/guru');
    }
}
