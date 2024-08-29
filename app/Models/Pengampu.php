<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dosen;
use App\Models\matakuliah;

class Pengampu extends Model
{
    use HasFactory;

    protected $table = 'pengampu';
    protected $fillable = []; //isi fillabel

    public function Dosen(){
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function Matakuliah(){
        return $this->belongsTo(matakuliah::class, 'id_matkul');
    }
}
