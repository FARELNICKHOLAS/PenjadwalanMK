<?php

namespace App\Models;

use App\Models\Jam;
use App\Models\Hari;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class hariJam extends Model
{
    use HasFactory;
    protected $table = 'harijam';
    protected $fillable = ['kode_hari', 'id_jam'];

    public function hari(){
        return $this->belongsTo(Hari::class, 'kode_hari');
    }

    public function jam(){
        return $this->belongsTo(Jam::class, 'id_jam');
    }
}
