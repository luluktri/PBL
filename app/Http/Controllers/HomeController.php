<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Presensi;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function tentang()
    {
        return view('tentang');
    }

    public function dashboard()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $guru = Guru::all()->count();
            $siswa = Siswa::all()->count();
            $kelas = Kelas::all()->count();

            return view('admin.dashboard', compact('guru', 'siswa', 'kelas'));

        } elseif ($user->role == 'guru') {
            $user = Auth::user();
            $jadwal = Jadwal::where('guru_id', $user->id)->whereDate('tanggal', Carbon::today())->get();

            return view('guru.dashboard', compact('jadwal'));

        } elseif ($user->role == 'siswa') {
            $siswa = Siswa::where('user_id', $user->id)->first();
            $presensi = Presensi::where('siswa_id', $siswa->id)->whereDate('tanggal', Carbon::today())->get();
            return view('siswa.dashboard', compact('siswa', 'presensi'));
        }
        return view('dashboard');
    }

    public function dashboard_guru()
    {
        return view('guru.dashboard');
    }

    public function dashboard_siswa()
    {
        return view('siswa.dashboard');
    }

    public function buat_qr()
    {
        return view('guru.buat_qr');
    }

    public function lihat_qr()
    {
        return view('guru.lihat_qr');
    }

    public function daftar_absensi()
    {
        return view('guru.daftar_absensi');
    }

    public function laporan_siswa()
    {
        return view('guru.laporan_siswa');
    }

    public function laporan_detail()
    {
        return view('guru.laporan_detail');
    }
}
