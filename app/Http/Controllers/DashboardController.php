<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SKTM;
use App\Models\PengantarKTP;
use App\Models\SuratKematian;

class DashboardController extends Controller
{
    public function index(){
        $sktm = SKTM::count();
        $pengantar_ktp = PengantarKTP::count();
        $surat_kematian = SuratKematian::count();
        return view('dashboard.index', [
            'sktm' => $sktm,
            'pengantar_ktp' => $pengantar_ktp,
            'surat_kematian' => $surat_kematian,
        ]);
    }

}
