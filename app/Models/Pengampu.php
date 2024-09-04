<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pengajar;

class Pengampu extends Model
{
    use HasFactory;

    protected $table = 'pengampu';
    protected $fillable = ['id_pengajar', 'ruang_kelas'];

    public function pengajar(){
        return $this->belongsTo(Pengajar::class, 'id_pengajar');
    }

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'ruang_kelas');
    }
}
