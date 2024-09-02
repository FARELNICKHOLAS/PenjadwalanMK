<?php

namespace App\Models;

use App\Models\Jam;
use App\Models\Hari;
use App\Models\Ruangan;
use App\Models\Pengampu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    const BEGINNILAI = 1;
    const JUMAT = 5;

    public function Hari(){
        return $this->belongsTo(Hari::class, 'id_hari');
    }

    public function Pengampu(){
        return $this->belongsTo(Pengampu::class, 'id_pengampu');
    }

    public function Jam(){
        return $this->belongsTo(Jam::class, 'id_jam');
    }

    public function Ruangan(){
        return $this->belongsTo(Ruangan::class, 'ruang_kelas');
    }
}
