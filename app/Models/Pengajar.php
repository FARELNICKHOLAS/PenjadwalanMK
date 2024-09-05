<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Dosen;
use App\Models\matakuliah;
use App\Models\kelas;

class Pengajar extends Model
{
    use HasFactory;

    protected $table = 'pengajar';
    protected $fillable = ['kode_ajaran', 'id_dosen', 'kode_matkul', 'id_namakelas'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id');
    }

    public function matkul(){
        return $this->belongsTo(matakuliah::class, 'kode_matkul');
    }

    public function namakelas(){
        return $this->belongsTo(kelas::class, 'id_namakelas');
    }

}
