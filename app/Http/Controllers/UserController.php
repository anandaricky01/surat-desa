<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('dashboard.user.index', [
            'users' => User::latest()->filter($request->only(['search']))->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'no_kk' => ['required', 'numeric', 'min:16'],
            'nik' => ['required', 'numeric', 'min:16', 'unique:users,nik'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'alamat' => ['required'],
            'gender' => ['required'],
            'no_hp' => ['required', 'numeric'],
            'password' => ['required', 'min:6'],
            'role' => ['required'],
        ]);

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
            User::create($validated);

            return redirect()->route('user.index')->with('success', 'Data user berhasil ditambah!');
        } catch (QueryException $e) {
            $errorInfoString = implode(", ", $e->errorInfo);
            return redirect()->back()->with('danger', 'Terdapat masalah dalam pengupdate an data Error : ' . $errorInfoString);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'no_kk' => ['required', 'numeric', 'min:16'],
            'nik' => ['required', 'numeric', 'min:16'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'alamat' => ['required'],
            'gender' => ['required'],
            'no_hp' => ['required', 'numeric'],
            'role' => ['required'],
        ]);

        if($request->email){
            if(User::where('email', $request->email)->where('id', '!=', $user->id)->count() > 0){
                return redirect()->back()->with('danger', 'Email sudah digunakan user lain!');
            }
        }

        if($request->username){
            if(User::where('username', $request->username)->where('id', '!=', $user->id)->count() > 0){
                return redirect()->back()->with('danger', 'username sudah digunakan user lain!');
            }
        }

        if($request->nik){
            if(User::where('nik', $request->nik)->where('id', '!=', $user->id)->count() > 0){
                return redirect()->back()->with('danger', 'NIK sudah digunakan user lain!');
            }
        }

        if($request->password){
            $validated['password'] = Hash::make($request->password);
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

            $user->update($validated);

            return redirect()->route('user.index')->with('success', 'Data user berhasil dirubah!');
        } catch (QueryException $e) {
            $errorInfoString = implode(", ", $e->errorInfo);
            return redirect()->back()->with('danger', 'Terdapat masalah dalam pengupdate an data Error : ' . $errorInfoString);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if ($user->foto) {
                Storage::delete($user->foto);
            }

            $user->delete();

            return redirect(route('user.index'))->with('success', 'User berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }
}
