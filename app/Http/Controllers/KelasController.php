<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        return view('admin.kelas.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kelas.tambah');
    }

    public function store(Request $request)
    {
        Kelas::create([
            'nama' => $request->nama
        ]);
        return redirect('/kelas');
    }

    public function edit($id)
    {
        $data = Kelas::find($id);
        return view('admin.kelas.ubah', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Kelas::whereId($id)->update([
            'nama' => $request->nama
        ]);
        return redirect('/kelas');

    }

    public function destroy($id)
    {
        Kelas::whereId($id)->delete();
        return redirect('/kelas');
    }
}
