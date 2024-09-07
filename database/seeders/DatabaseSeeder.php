<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Hari;
use App\Models\Jam;
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
            'nip' => '197806212006041002',
            'nama' => 'Cokorda Rai Adi Pramatha, S.T., M.M., Ph.D'
        ]);
        Dosen::create([
            'nip' => '197404071998022001',
            'nama' => 'Dr. Anak Agung Istri Ngurah Eka Karyawati, S.Si., M.Eng.',
        ]);
        Dosen::create([
            'nip' => '198212202008011008',
            'nama' => 'I Made Widiartha, S.Si., M. Kom',
        ]);
        Dosen::create([
            'nip' => '196401141994022001',
            'nama' => 'Dr. Dra. Luh Gede Astuti, M.Kom.',
        ]);
        Dosen::create([
            'nip' => '196704141992031002',
            'nama' => 'Dr. Drs. I Wayan Santiyasa,M.Si.',
        ]);
        Dosen::create([
            'nip' => '197511052005011004',
            'nama' => 'I Made Widhi Wirawan, S.Si., M.Si., M.Cs.',
        ]);
        Dosen::create([
            'nip' => '1984082920181113001',
            'nama' => 'I Wayan Supriana, S.Si., M.Cs.',
        ]);
        Dosen::create([
            'nip' => '1985091920181113001',
            'nama' => 'Dr. Made Agung Raharja, S.Si., M.Cs.',
        ]);
        Dosen::create([
            'nip' => '197511052005011004',
            'nama' => 'I Gusti Ngurah Anom Cahyadi Putra, ST., M.Cs',
        ]);
        Dosen::create([
            'nip' => '197803212005011001',
            'nama' => 'Dr. Ir. Ngurah Agus Sanjaya ER, S.Kom., M.Kom.',
        ]);
        Dosen::create([
            'nip' => '198012062006041003',
            'nama' => 'I Gede Santi Astawa, S.T., M.Cs.',
        ]);
        Dosen::create([
            'nip' => '198209182008122002',
            'nama' => 'Luh Arida Ayu Rahning Putri, S.Kom., M.Cs.',
        ]);
        Dosen::create([
            'nip' => '198310222008121001',
            'nama' => 'I Gede Arta Wibawa, S.T., M.Kom.',
        ]);
        Dosen::create([
            'nip' => '197201102008121001',
            'nama' => 'Dr. Ir. I Ketut Gede Suhartana, S.Kom., M.Kom., IPM., ASEAN.Eng',
        ]);
        Dosen::create([
            'nip' => '198901272012121001',
            'nama' => 'I Dewa Made Bayu Atmaja Darmawan,S.Kom.,M.Cs.',
        ]);
        Dosen::create([
            'nip' => '198812282014041001',
            'nama' => 'I Putu Gede Hendra Suputra, S.Kom.,M.Kom.',
        ]);
        Dosen::create([
            'nip' => '198501302015041003',
            'nama' => 'Ir. I Gusti Agung Gede Arya Kadyanan, S.Kom, M.Kom',
        ]);
        Dosen::create([
            'nip' => '198703172022031001',
            'nama' => 'I Gede Surya Rahayuda, M.Kom.',
        ]);
        Dosen::create([
            'nip' => '199006062022032009',
            'nama' => 'Gst. Ayu Vida Mastrika Giri, S.Kom., M.Cs.',
        ]);
        Dosen::create([
            'nip' => '198912262022032008',
            'nama' => 'Ida Ayu Gde Suwiprabayanti Putra, S.Kom., M.T.',
        ]);

        // Semester I
        matakuliah::create([
            'kode_matkul' => '24SIFH16X001',
            'nama_matkul' => 'Etika Profesi',
            'sks' => '2',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        matakuliah::create([
            'kode_matkul' => '24SIFH16X002',
            'nama_matkul' => 'Kewarganegaraan',
            'sks' => '2',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Umum',
        ]);
        matakuliah::create([
            'kode_matkul' => '24SIFH16X003',
            'nama_matkul' => 'Bahasa Indonesia ',
            'sks' => '2',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Umum',
        ]);
        matakuliah::create([
            'kode_matkul' => '24SIFH16X004',
            'nama_matkul' => 'Ilmu Sosial Dasar',
            'sks' => '2',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Umum',
        ]);
        matakuliah::create([
            'kode_matkul' => '24SIFH16X005',
            'nama_matkul' => 'Matematika Diskrit I',
            'sks' => '2',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        matakuliah::create([
            'kode_matkul' => '24SIFH16X006',
            'nama_matkul' => 'Matematika Informatika',
            'sks' => '3',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);

        matakuliah::create([
            'kode_matkul' => '24SIFH16X007',
            'nama_matkul' => 'Algoritma & Pemrograman ',
            'sks' => '2',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);

        matakuliah::create([
            'kode_matkul' => '24SIFH16X008',
            'nama_matkul' => 'Statistika Dasar',
            'sks' => '2',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);

        matakuliah::create([
            'kode_matkul' => '24SIFH16X009',
            'nama_matkul' => 'Sistem Digital',
            'sks' => '3',
            'semester' => '1',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        // Semester II
        matakuliah::create([
            'kode_matkul' => '24SIFH16Y010',
            'nama_matkul' => 'Pancasila',
            'sks' => '2',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Umum',
        ]);
        matakuliah::create([
            'kode_matkul' => '24SIFH16X011',
            'nama_matkul' => 'Pendidikan Agama',
            'sks' => '2',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Umum',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X012',
            'nama_matkul' => 'Matematika Diskrit II',
            'sks' => '3',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X013',
            'nama_matkul' => 'Struktur Data',
            'sks' => '3',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X014',
            'nama_matkul' => 'Sistem Operasi',
            'sks' => '3',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X015',
            'nama_matkul' => 'Pengantar Probabilitas',
            'sks' => '3',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X016',
            'nama_matkul' => 'Organisasi dan Arsitektur Komputer',
            'sks' => '3',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X017',
            'nama_matkul' => 'Kewirausahaan',
            'sks' => '2',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Umum',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X018',
            'nama_matkul' => 'Tata Tulis Karya Ilmiah',
            'sks' => '2',
            'semester' => '2',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X019',
            'nama_matkul' => 'Interaksi Manusia dan Komputer',
            'sks' => '3',
            'semester' => '3',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X020',
            'nama_matkul' => 'Basis Data',
            'sks' => '3',
            'semester' => '3',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X021',
            'nama_matkul' => 'Desain dan Analisis Algoritma',
            'sks' => '3',
            'semester' => '3',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X022',
            'nama_matkul' => 'Rekayasa Perangkat Lunak',
            'sks' => '3',
            'semester' => '3',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X023',
            'nama_matkul' => 'Pemrograman Berorientasi Objek',
            'sks' => '3',
            'semester' => '3',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X024',
            'nama_matkul' => 'Komunikasi Data dan Jaringan Komputer',
            'sks' => '3',
            'semester' => '3',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X025',
            'nama_matkul' => 'Teori Bahasa dan Otomata',
            'sks' => '3',
            'semester' => '3',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X026',
            'nama_matkul' => 'Metode Penelitian',
            'sks' => '2',
            'semester' => '4',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X027',
            'nama_matkul' => 'Analisis dan Desain Sistem',
            'sks' => '3',
            'semester' => '4',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X028',
            'nama_matkul' => 'Pengantar Kecerdasan Buatan',
            'sks' => '3',
            'semester' => '4',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X029',
            'nama_matkul' => 'Sistem Informasi',
            'sks' => '3',
            'semester' => '4',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X030',
            'nama_matkul' => 'Pengantar Pemrosesan Data Multimedia',
            'sks' => '3',
            'semester' => '4',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X031',
            'nama_matkul' => 'Keamanan Jaringan',
            'sks' => '3',
            'semester' => '4',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X032',
            'nama_matkul' => 'Pemrograman Berbasis Web',
            'sks' => '3',
            'semester' => '4',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X033',
            'nama_matkul' => 'Komputer dan Masyarakat',
            'sks' => '2',
            'semester' => '5',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X034',
            'nama_matkul' => 'Pemodelan dan Simulasi',
            'sks' => '3',
            'semester' => '5',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X035',
            'nama_matkul' => 'Grafika Komputer',
            'sks' => '3',
            'semester' => '5',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X036',
            'nama_matkul' => 'Sains Data',
            'sks' => '3',
            'semester' => '5',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X037',
            'nama_matkul' => 'Basis Data Lanjut',
            'sks' => '3',
            'semester' => '5',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X038',
            'nama_matkul' => 'Desain dan Pengujian Berpusat pada Pengguna',
            'sks' => '3',
            'semester' => '5',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X039',
            'nama_matkul' => 'Teknologi Logika Fuzzy',
            'sks' => '3',
            'semester' => '5',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X040',
            'nama_matkul' => 'Teknologi IOT',
            'sks' => '3',
            'semester' => '5',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X041',
            'nama_matkul' => 'Praktik Kerja Lapangan (PKL)',
            'sks' => '2',
            'semester' => '6',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X042',
            'nama_matkul' => 'Siklus Hidup Proyek Kecerdasan Buatan',
            'sks' => '3',
            'semester' => '6',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X043',
            'nama_matkul' => 'Pengantar Deep Learning',
            'sks' => '3',
            'semester' => '6',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X044',
            'nama_matkul' => 'Mata Kuliah Pilihan Wajib Jalur',
            'sks' => '3',
            'semester' => '6',
            'jenis_semester' => 'Genap',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X045',
            'nama_matkul' => 'Mata Kuliah Pilihan Bebas',
            'sks' => '3',
            'semester' => '6',
            'jenis_semester' => 'Genap',
            'tipe' => 'Pilihan',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X046',
            'nama_matkul' => 'Kuliah Kerja Nyata (KKN)',
            'sks' => '2',
            'semester' => '7',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X047',
            'nama_matkul' => 'Mata Kuliah Pilihan Wajib Jalur',
            'sks' => '3',
            'semester' => '7',
            'jenis_semester' => 'Ganjil',
            'tipe' => 'Wajib',
        ]);
        
        matakuliah::create([
            'kode_matkul' => '24SIFH16X048',
            'nama_matkul' => 'Tugas Akhir',
            'sks' => '6',
            'semester' => '7',
            'jenis_semester' => 'Ganjil',
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
            'kode_ruangan' => 'R01',
            'nama_ruangan' => 'FMIPA 1.1',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R02',
            'nama_ruangan' => 'FMIPA 1.2',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R03',
            'nama_ruangan' => 'FMIPA 1.3',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R04',
            'nama_ruangan' => 'FMIPA 1.4',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R05',
            'nama_ruangan' => 'FMIPA 2.1',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R06',
            'nama_ruangan' => 'FMIPA 2.2',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R07',
            'nama_ruangan' => 'FMIPA 2.3',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R08',
            'nama_ruangan' => 'FMIPA 2.4',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R09',
            'nama_ruangan' => 'FMIPA 2.5',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R10',
            'nama_ruangan' => 'FMIPA 3.1',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R11',
            'nama_ruangan' => 'FMIPA 3.2',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R12',
            'nama_ruangan' => 'FMIPA 3.3',
        ]);
        Ruangan::create([
            'kode_ruangan' => 'R13',
            'nama_ruangan' => 'FMIPA 3.4',
        ]);

        Jam::create([
            'sesi' => '08.00-10.30',
        ]);
        Jam::create([
            'sesi' => '10.30-13.00',
        ]);
        Jam::create([
            'sesi' => '13.30-16.00',
        ]);

        Hari::create([
            'nama' => 'Senin',
        ]);
        Hari::create([
            'nama' => 'Selasa',
        ]);
        Hari::create([
            'nama' => 'Rabu',
        ]);
        Hari::create([
            'nama' => 'Kamis',
        ]);
        Hari::create([
            'nama' => 'Jumat',
        ]);

        kelas::create([
            'nama' => 'A',
            'jenis' => 'REGULER',
        ]);
        kelas::create([
            'nama' => 'B',
            'jenis' => 'REGULER',
        ]);
        kelas::create([
            'nama' => 'C',
            'jenis' => 'REGULER',
        ]);
        kelas::create([
            'nama' => 'D',
            'jenis' => 'REGULER',
        ]);
        kelas::create([
            'nama' => 'E',
            'jenis' => 'REGULER',
        ]);
        kelas::create([
            'nama' => 'F',
            'jenis' => 'REGULER',
        ]);
        kelas::create([
            'nama' => 'A',
            'jenis' => 'NONREGULER',
        ]);
    }
}
