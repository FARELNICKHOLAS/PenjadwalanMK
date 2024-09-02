<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\kelas;
use App\Models\matakuliah;
use App\Models\Pengajar;
use App\Models\Ruangan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Dosen::create([
            'nip' => '2003',
            'nama' => 'Vida Mastrika',
        ]);
        Dosen::create([
            'nip' => '2004',
            'nama' => 'Agung Raharja',
        ]);
        Dosen::create([
            'nip' => '2005',
            'nama' => 'Made Widiartha',
        ]);
        Dosen::create([
            'nip' => '2006',
            'nama' => 'Eka Karyawati',
        ]);

        matakuliah::create([
            'kode_matkul' => 'IF001',
            'nama_matkul' => 'Algoritma Pemrograman',
            'sks' => '3',
            'semester' => '1',
            'tipe' => 'Wajib',
        ]);
        matakuliah::create([
            'kode_matkul' => 'IF002',
            'nama_matkul' => 'Desain Sistem',
            'sks' => '2',
            'semester' => '2',
            'tipe' => 'Wajib',
        ]);
        matakuliah::create([
            'kode_matkul' => 'IF003',
            'nama_matkul' => 'Struktur Data',
            'sks' => '3',
            'semester' => '2',
            'tipe' => 'Wajib',
        ]);
        matakuliah::create([
            'kode_matkul' => 'IF004',
            'nama_matkul' => 'Etika Profesi',
            'sks' => '2',
            'semester' => '1',
            'tipe' => 'Wajib',
        ]);
        matakuliah::create([
            'kode_matkul' => 'IF005',
            'nama_matkul' => 'Sistem Digital',
            'sks' => '3',
            'semester' => '1',
            'tipe' => 'Wajib',
        ]);

        kelas::create([
            'nama' => 'A',
            'jenis' => 'Reguler',
        ]);
        kelas::create([
            'nama' => 'B',
            'jenis' => 'Reguler',
        ]);
        kelas::create([
            'nama' => 'C',
            'jenis' => 'Reguler',
        ]);
        kelas::create([
            'nama' => 'D',
            'jenis' => 'Reguler',
        ]);
        kelas::create([
            'nama' => 'E',
            'jenis' => 'Reguler',
        ]);
        kelas::create([
            'nama' => 'F',
            'jenis' => 'Reguler',
        ]);

        Ruangan::create([
            'kode_ruangan' => '1001',
            'nama_ruangan' => 'R1.1',
        ]);
        Ruangan::create([
            'kode_ruangan' => '1002',
            'nama_ruangan' => 'R1.2',
        ]);
        Ruangan::create([
            'kode_ruangan' => '1003',
            'nama_ruangan' => 'R1.3',
        ]);
        Ruangan::create([
            'kode_ruangan' => '1004',
            'nama_ruangan' => 'R1.4',
        ]);
        Ruangan::create([
            'kode_ruangan' => '1005',
            'nama_ruangan' => 'R1.5',
        ]);

        Pengajar::create([
            'kode_ajaran' => '1',
            'id_dosen' => '2',
            'kode_matkul' => '4',
            'id_namakelas' => '5',
        ]);
        Pengajar::create([
            'kode_ajaran' => '2',
            'id_dosen' => '1',
            'kode_matkul' => '5',
            'id_namakelas' => '4',
        ]);
        Pengajar::create([
            'kode_ajaran' => '3',
            'id_dosen' => '4',
            'kode_matkul' => '3',
            'id_namakelas' => '1',
        ]);
        Pengajar::create([
            'kode_ajaran' => '4',
            'id_dosen' => '3',
            'kode_matkul' => '1',
            'id_namakelas' => '3',
        ]);
    }
}
