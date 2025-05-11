<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Dosen;
use App\Models\matakuliah;

class Pengajar extends Model
{
    use HasFactory;

    protected $table = 'pengajar';
    protected $fillable = ['kode_ajaran', 'id_dosen', 'kode_matkul', 'kelas'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function matkul(){
        return $this->belongsTo(matakuliah::class, 'kode_matkul');
    }

}
