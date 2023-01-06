<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $data = Mapel::all();
        return view('admin.mapel.index', compact('data'));
    }

    public function create()
    {
        return view('admin.mapel.tambah');
    }

    public function store(Request $request)
    {
        Mapel::create([
            'nama' => $request->nama
        ]);
        return redirect('/mapel');
    }

    public function edit($id)
    {
        $data = Mapel::find($id);
        return view('admin.mapel.ubah', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Mapel::whereId($id)->update([
            'nama' => $request->nama
        ]);
        return redirect('/mapel');

    }

    public function destroy($id)
    {
        Mapel::whereId($id)->delete();
        return redirect('/mapel');
    }
}
