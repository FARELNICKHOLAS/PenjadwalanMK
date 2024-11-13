<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function delete(){
        Jadwal::truncate();
        return redirect()->back();
    }

    public function cetakJadwal(){
        //
    }
}
