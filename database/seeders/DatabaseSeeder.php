<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        for ($i=1; $i < 4; $i++) {
            $user = User::create([
                'email' => 'guru'.$i.'@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'guru',
            ]);
            Guru::create([
                'nik' => random_int(10000000, 99999999),
                'nama' => 'Guru '. $i,
                'alamat' => 'Jl. Sepatu No.'. $i,
                'tanggal_lahir' => \Carbon\Carbon::now()->subDays(rand(0, 90))->format('Y-m-d'),
                'no_telepon' => '0'.random_int(80000000000, 89999999999),
                'user_id' => $user->id
            ]);
        }

        $kelas = ['TKJ', 'TSM', 'TPHP'];
        foreach ($kelas as $data) {
            Kelas::create([
                'nama' => '12 '.$data
            ]);
        }

        $mapel = ['Agama', 'Bahasa Indonesia', 'Bahasa Inggris'];
        foreach ($mapel as $data) {
            Mapel::create([
                'nama' => $data
            ]);
        }

        for ($i=1; $i < 6; $i++) {
            $user = User::create([
                'email' => 'siswa'.$i.'@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'siswa',
            ]);
            Siswa::create([
                'nis' => random_int(10000000, 99999999),
                'nama' => 'Siswa '. $i,
                'no_absen' => $i,
                'kelas_id' => 1,
                'alamat' => 'Jl. Melati No.'. $i,
                'tanggal_lahir' => \Carbon\Carbon::now()->subDays(rand(0, 90))->format('Y-m-d'),
                'no_telepon' => '0'.random_int(80000000000, 89999999999),
                'user_id' => $user->id,
            ]);
        }
    }
}
