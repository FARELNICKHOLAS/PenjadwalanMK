<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\kelas;
use App\Models\Pengajar;
use App\Models\matakuliah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PengajarImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $idMatkul = $this->getIdMatkul($row);
        $idDosen = $this->getIdDosen($row);
        $idNamaKelas = $this->getIdNamaKelas($row);
        return new Pengajar([
            'kode_ajaran' => $row['kode_ajaran'],
            'id_dosen' => $idDosen,
            'kode_matkul' => $idMatkul,
            'id_namakelas' => $idNamaKelas,
        ]);
    }

    public function getIdMatkul(array $row){
        $matkul = matakuliah::where('nama_matkul', $row['nama_matakuliah'])->first();
        if ($matkul) {
            return $matkul->id;
        } else {
            return 0;
        }
    }

    public function getIdDosen(array $row){
        $idDosen = Dosen::where('nama', $row['nama_pengampu'])->first();
        if ($idDosen) {
            return $idDosen->id;
        } else {
            return 0;
        }
    }

    public function getIdNamaKelas(array $row){
        $idNamaKelas = kelas::where('nama', $row['kelas_diampu'])->first();
        if ($idNamaKelas) {
            return $idNamaKelas->id;
        } else {
            return 0;
        }
    }
}
