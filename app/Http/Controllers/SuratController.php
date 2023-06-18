<?php

namespace App\Http\Controllers;

use App\Models\PengantarKTP;
use App\Models\SKTM;
use App\Models\SuratKematian;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SuratController extends Controller
{
    public function pengantar_ktp(){
        return view('dashboard.pengantar_ktp.create');
    }

    public function sktm(){
        return view('dashboard.sktm.create');
    }

    public function surat_kematian(){
        return view('dashboard.surat_kematian.create');
    }

    public function kirim_pengantar_ktp(Request $request){

        foreach ($request->except(['_token', 'scan_kk', 'keterangan']) as $key => $value) {
            if($value == null){
                return redirect()->back()->with('danger', 'Data ' . $key . ' anda masih kosong! Lengkapi Biodata anda dengan mengunjungi halaman <a href="' . route('biodata') . '">Biodata</a>');
            }
        }

        $validated = $request->validate([
            'name' => ['required'],
            'nik' => ['required', 'numeric', 'min:16'],
            'no_kk' => ['required', 'numeric', 'min:16'],
            'gender' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'pekerjaan' => ['required'],
            'no_hp' => ['required'],
            'keterangan' => ['required'],
        ]);

        $validated['scan_kk'] = $this->scan_kk($request->file('scan_kk'));
        $validated['user_id'] = auth()->user()->id;
        $validated['status'] = 'sedang diproses';

        // variabel untuk memasukan data dalam model PengantarKTP
        $data = [];

        foreach (['scan_kk', 'user_id', 'status', 'keterangan'] as $key) {
            $data[$key] = $validated[$key];
        }

        try {
            //code...
            PengantarKTP::create($data);

            return redirect()->route('status_request');
        } catch (QueryException $e) {
            $errorInfoString = implode(", ", $e->errorInfo);
            return redirect()->back()->with('danger', 'Terdapat masalah dalam pengupdate an data Error : ' . $errorInfoString);
        }
    }

    public function kirim_sktm(Request $request){

        foreach ($request->except(['_token', 'scan_ktp', 'scan_kk', 'keterangan']) as $key => $value) {
            if($value == null){
                return redirect()->back()->with('danger', 'Data ' . $key . ' anda masih kosong! Lengkapi Biodata anda dengan mengunjungi halaman <a href="' . route('biodata') . '">Biodata</a>');
            }
        }

        $validated = $request->validate([
            'name' => ['required'],
            'nik' => ['required', 'numeric', 'min:16'],
            'no_kk' => ['required', 'numeric', 'min:16'],
            'gender' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'pekerjaan' => ['required'],
            'no_hp' => ['required'],
            'keterangan' => ['required'],
        ]);

        $validated['scan_kk'] = $this->scan_kk($request->file('scan_kk'));
        $validated['scan_ktp'] = $this->scan_ktp($request->file('scan_ktp'));
        $validated['user_id'] = auth()->user()->id;
        $validated['status'] = 'sedang diproses';

        // variabel untuk memasukan data dalam model PengantarKTP
        $data = [];

        foreach (['scan_kk', 'scan_ktp', 'user_id', 'status', 'keterangan'] as $key) {
            $data[$key] = $validated[$key];
        }

        try {
            //code...
            SKTM::create($data);

            return redirect()->route('status_request');
        } catch (QueryException $e) {
            $errorInfoString = implode(", ", $e->errorInfo);
            return redirect()->back()->with('danger', 'Terdapat masalah dalam pengupdate an data Error : ' . $errorInfoString);
        }
    }

    public function kirim_surat_kematian(Request $request){

        foreach ($request->except(['_token', 'scan_ktp']) as $key => $value) {
            if($value == null){
                return redirect()->back()->with('danger', 'Data ' . $key . ' anda masih kosong! Lengkapi Biodata anda dengan mengunjungi halaman <a href="' . route('biodata') . '">Biodata</a>');
            }
        }

        $validated = $request->validate([
            'name' => ['required'],
            'nik' => ['required', 'numeric', 'min:16'],
            'no_kk' => ['required', 'numeric', 'min:16'],
            'gender' => ['required'],
            'tempat_meninggal' => ['required'],
            'tanggal_meninggal' => ['required'],
            'umur' => ['required'],
            'sebab_meninggal' => ['required'],
        ]);

        $validated['scan_ktp'] = $this->scan_ktp($request->file('scan_ktp'));
        $validated['user_id'] = auth()->user()->id;
        $validated['status'] = 'sedang diproses';

        try {
            //code...
            SuratKematian::create($validated);

            return redirect()->route('status_request');
        } catch (QueryException $e) {
            $errorInfoString = implode(", ", $e->errorInfo);
            return redirect()->back()->with('danger', 'Terdapat masalah dalam pengupdate an data Error : ' . $errorInfoString);
        }
    }

    public function status_request(Request $request){

        // mengambil data dari model SKTM dan PengantarKTP
        $sktm = SKTM::where('user_id', auth()->user()->id)->get();
        $pengantar_ktp = PengantarKTP::where('user_id', auth()->user()->id)->get();
        $surat_kematian = SuratKematian::where('user_id', auth()->user()->id)->get();

        // instansi baru dari collection, untuk menggabungkan data data dari model SKTM dan PengantarKTP
        $surat = new Collection();
        $surat = $surat->merge($sktm);
        $surat = $surat->merge($pengantar_ktp);
        $surat = $surat->merge($surat_kematian);

        $currentPage = $request->get('page'); // variabel untuk menentukan halaman saat ini
        $perPage = 5; // variabel untuk menentukan banyak data per halaman
        $total = $sktm->count() + $pengantar_ktp->count() + $surat_kematian->count(); // variabel untuk menghitung banyak data gabungan dari model model surat

        // Mengurutkan data $surat berdasarkan kolom 'status' dengan nilai 'sedang diproses' dan 'created_at'
        $surat = $surat->sortByDesc(function ($item) {
            return $item->status === 'sedang diproses' ? 1 : 0;
        })->sortByDesc('created_at');

        // buat paginasi
        $surat = new LengthAwarePaginator(
            $surat->forPage($currentPage, $perPage),
            $total,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('dashboard.surat.status_request',[
            'surats' => $surat,
            'perPage' => $perPage,
        ]);
    }

    public function permohonan_surat_masuk(Request $request){
        // mengambil data dari model SKTM dan PengantarKTP
        $sktm = SKTM::latest()->filter($request->only('search'))->get();
        $pengantar_ktp = PengantarKTP::latest()->filter($request->only('search'))->get();
        $surat_kematian = SuratKematian::latest()->filter($request->only('search'))->get();

        // instansi baru dari collection, untuk menggabungkan data data dari model SKTM dan PengantarKTP
        $surat = new Collection();
        $surat = $surat->merge($sktm);
        $surat = $surat->merge($pengantar_ktp);
        $surat = $surat->merge($surat_kematian);

        $currentPage = $request->get('page'); // variabel untuk menentukan halaman saat ini
        $perPage = 5; // variabel untuk menentukan banyak data per halaman
        $total = $sktm->count() + $pengantar_ktp->count() + $surat_kematian->count(); // variabel untuk menghitung banyak data gabungan dari model model surat

        // hitung jumlah surat berdasarkan status
        $surat_sedang_diproses = $sktm->where('status', 'sedang diproses')->count() + $pengantar_ktp->where('status', 'sedang diproses')->count() + $surat_kematian->where('status', 'sedang diproses')->count();
        $surat_diacc = $sktm->where('status', 'acc')->count() + $pengantar_ktp->where('status', 'acc')->count() + $surat_kematian->where('status', 'acc')->count();
        $surat_tidak_diacc = $sktm->where('status', 'tidak acc')->count() + $pengantar_ktp->where('status', 'tidak acc')->count() + $surat_kematian->where('status', 'tidak acc')->count();

        // Mengurutkan data $surat berdasarkan kolom 'status' dengan nilai 'sedang diproses' dan 'created_at'
        $surat = $surat->sortByDesc(function ($item) {
            return $item->status === 'sedang diproses' ? 1 : 0;
        });

        // buat paginasi
        $surat = new LengthAwarePaginator(
            $surat->forPage($currentPage, $perPage),
            $total,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('dashboard.surat.permohonan_surat_masuk',[
            'surats' => $surat,
            'perPage' => $perPage,
            'sedang_diproses' => $surat_sedang_diproses,
            'acc' => $surat_diacc,
            'tidak_acc' => $surat_tidak_diacc,
        ]);
    }

    public function laporan(Request $request){
        // mengambil data dari model SKTM dan PengantarKTP
        $sktm = SKTM::latest()->filter($request->only('search'))->get();
        $pengantar_ktp = PengantarKTP::latest()->filter($request->only('search'))->get();
        $surat_kematian = SuratKematian::latest()->filter($request->only('search'))->get();

        // instansi baru dari collection, untuk menggabungkan data data dari model SKTM dan PengantarKTP
        $surat = new Collection();
        $surat = $surat->merge($sktm);
        $surat = $surat->merge($pengantar_ktp);
        $surat = $surat->merge($surat_kematian);

        $currentPage = $request->get('page'); // variabel untuk menentukan halaman saat ini
        $perPage = 5; // variabel untuk menentukan banyak data per halaman
        $total = $sktm->where('status', '!=' ,'sedang diproses')->count() + $pengantar_ktp->where('status', '!=' ,'sedang diproses')->count() + $surat_kematian->where('status', '!=' ,'sedang diproses')->count(); // variabel untuk menghitung banyak data gabungan dari model model surat

        // hitung jumlah surat berdasarkan status
        $surat_sedang_diproses = $sktm->where('status', 'sedang diproses')->count() + $pengantar_ktp->where('status', 'sedang diproses')->count() + $surat_kematian->where('status', 'sedang diproses')->count();
        $surat_diacc = $sktm->where('status', 'acc')->count() + $pengantar_ktp->where('status', 'acc')->count() + $surat_kematian->where('status', 'acc')->count();
        $surat_tidak_diacc = $sktm->where('status', 'tidak acc')->count() + $pengantar_ktp->where('status', 'tidak acc')->count() + $surat_kematian->where('status', 'tidak acc')->count();

        // Mengurutkan data $surat berdasarkan kolom 'status' dengan nilai 'sedang diproses' dan 'created_at'
        $surat = $surat->where('status', '!=' ,'sedang diproses');

        // buat paginasi
        $surat = new LengthAwarePaginator(
            $surat->forPage($currentPage, $perPage),
            $total,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('dashboard.surat.laporan',[
            'surats' => $surat,
            'perPage' => $perPage,
            'sedang_diproses' => $surat_sedang_diproses,
            'acc' => $surat_diacc,
            'tidak_acc' => $surat_tidak_diacc,
        ]);
    }

    public function detail_pengantar_ktp($id){
        try {
            $pengantar_ktp = PengantarKTP::where('id', $id)->first();
            // dd($pengantar_ktp);

            return view('dashboard.surat.detail_pengantar_ktp', [
                'pengantar_ktp' => $pengantar_ktp,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Data surat tidak ditemukan!');
        }
    }

    public function detail_sktm($id){
        try {
            //code...
            $sktm = SKTM::where('id', $id)->first();
            // dd($sktm);
            return view('dashboard.surat.detail_sktm', [
                'sktm' => $sktm,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('danger', 'Data surat tidak ditemukan!');
        }
    }

    public function detail_surat_kematian($id){
        try {
            //code...
            $surat_kematian = SuratKematian::where('id', $id)->first();
            // dd($surat_kematian);
            return view('dashboard.surat.detail_surat_kematian', [
                'surat_kematian' => $surat_kematian,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('danger', 'Data surat tidak ditemukan!');
        }
    }

    public function proses_surat(Request $request, $id, $proses){
        if($proses == 'acc'){
            if($request->jenis_surat == 'Surat Keterangan Tidak Mampu'){
                SKTM::where('id', $id)->update([
                    'status' => 'acc',
                    'tanggapan' => $request->tanggapan,
                ]);
            } else if($request->jenis_surat == 'Surat Kematian'){
                SuratKematian::where('id', $id)->update([
                    'status' => 'acc',
                    'tanggapan' => $request->tanggapan,
                ]);
            } else{
                PengantarKTP::where('id', $id)->update([
                    'status' => 'acc',
                    'tanggapan' => $request->tanggapan,
                ]);
            }

            return redirect()->back()->with('success', 'Surat berhasil diacc');
        } else {
            if($request->jenis_surat == 'Surat Keterangan Tidak Mampu'){
                SKTM::where('id', $id)->update([
                    'status' => 'tidak acc',
                    'tanggapan' => $request->tanggapan,
                ]);
            } else if($request->jenis_surat == 'Surat Kematian'){
                SuratKematian::where('id', $id)->update([
                    'status' => 'tidak acc',
                    'tanggapan' => $request->tanggapan,
                ]);
            } else{
                PengantarKTP::where('id', $id)->update([
                    'status' => 'tidak acc',
                    'tanggapan' => $request->tanggapan,
                ]);
            }

            return redirect()->back()->with('success', 'Surat berhasil ditolak');
        }

        return redirect()->back()->with('danger', 'Kegiatan tidak berhasil dilakukan!');
    }

    // scan kk adalah instansi dari $request->file('scan_kk')
    function scan_kk($scan_kk){
        if($scan_kk){
            $fileImage = $scan_kk;
            $fileExtension = strtolower($fileImage->getClientOriginalExtension());

            if ($fileExtension === 'jpg' || $fileExtension === 'jpeg' || $fileExtension === 'png') {

                $fileNameImage = time() . '_KK_' . $fileImage->getClientOriginalName();
                return $foto_kk = $fileImage->storeAs('public/uploads/berkas', $fileNameImage);
            } else {
                return redirect()->back()->with('danger', 'File foto harus berformat PNG, JPEG, JPG!');
            }
        } else {
            return redirect()->back()->with('danger', 'Harus terdapat Scan Foto Kartu Keluarga!');
        }
    }

    function scan_ktp($scan_ktp){
        if($scan_ktp){
            $fileImage = $scan_ktp;
            $fileExtension = strtolower($fileImage->getClientOriginalExtension());

            if ($fileExtension === 'jpg' || $fileExtension === 'jpeg' || $fileExtension === 'png') {

                $fileNameImage = time() . '_KTP_' . $fileImage->getClientOriginalName();
                return $foto_kk = $fileImage->storeAs('public/uploads/berkas', $fileNameImage);
            } else {
                return redirect()->back()->with('danger', 'File foto harus berformat PNG, JPEG, JPG!');
            }
        } else {
            return redirect()->back()->with('danger', 'Harus terdapat Scan Foto Kartu Tanda Penduduk!');
        }
    }


}
