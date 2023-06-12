<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index(){
        return view('dashboard.biodata.index');
    }

    public function edit(){
        return view('dashboard.biodata.edit');
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'gender' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required', 'numeric'],
            'email' => ['required'],
            'nik' => ['required', 'numeric'],
            'username' => ['required'],
            'no_kk' => ['required', 'numeric'],
        ]);

        if($request->tempat_lahir){
            $validated['tempat_lahir'] = $request->tempat_lahir;
        }

        if($request->tanggal_lahir){
            $validated['tanggal_lahir'] = $request->tanggal_lahir;
        }

        if($request->pekerjaan){
            $validated['pekerjaan'] = $request->pekerjaan;
        }

        if($request->jabatan){
            $validated['jabatan'] = $request->jabatan;
        }

        if($request->email){
            if (User::where('email', $request->email)->where('id', '!=', auth()->user()->id)->count() > 0) {
                return redirect()->back()->with('danger', 'Email sudah dipakai user lain');
            }
        }

        if($request->username){
            if (User::where('username', $request->username)->where('id', '!=', auth()->user()->id)->count() > 0) {
                return redirect()->back()->with('danger', 'Username sudah dipakai user lain');
            }
        }

        if ($request->file('foto')) {

            $fileImage = $request->file('foto');
            $fileExtension = strtolower($fileImage->getClientOriginalExtension());

            if ($fileExtension === 'jpg' || $fileExtension === 'jpeg' || $fileExtension === 'png') {
                if (auth()->user()->foto != null) {
                    Storage::delete(auth()->user()->foto);
                }
                $fileNameImage = time() . '_' . $fileImage->getClientOriginalName();
                $validated['foto'] = $fileImage->storeAs('public/uploads/profile', $fileNameImage);
            } else {
                return redirect()->back()->with('danger', 'File foto harus berformat PNG, JPEG, JPG!');
            }
        }

        try {
            User::where('id', auth()->user()->id)->update($validated);

            return redirect()->route('biodata')->with('success', 'Data berhasil dirubah!');
        } catch (QueryException $e) {
            $errorInfoString = implode(", ", $e->errorInfo);
            return redirect()->back()->with('danger', 'Terdapat masalah dalam pengupdate an data Error : ' . $errorInfoString);
        }
    }
}
