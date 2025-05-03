<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data = array(
            'title'             => 'Data User',
            'menuAdminUser'     => 'active',
            'user'              =>User::orderBy('jabatan','asc')->get(),
        );
        return view('admin/user/index',$data);
    }

    public function create(){
        $data = array(
            'title'             => 'Tambah Data User',
            'menuAdminUser'     => 'active',
        );
        return view('admin/user/create',$data);
    }

    public function edit(){
        $data = array(
            'title'             => 'Edit Data User',
            'menuAdminUser'     => 'active',
            'user'              =>User::find(request()->id),
        );
        return view('admin/user/edit',$data);
    }

    public function store(Request $request){
        request()->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'jabatan' => 'required',
        ],[
            'nama.required'       => 'Nama wajib diisi',
            'email.required'      => 'Email wajib diisi',
            'email.unique'        => 'Email sudah terdaftar',
            'password.required'   => 'Password wajib diisi',
            'password.confirmed'  => 'Password tidak sama',
            'password.min'        => 'Password harus minimal 8 karakter',
            'jabatan.required'    => 'Jabatan wajib diisi',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->jabatan = $request->jabatan;
        $user->is_tugas = false;
        $user->save();
        return redirect()->route('user')->with('success','Data Berhasil Ditambahkan');

    }
    
    public function update(Request $request, $id){
        request()->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email,' .$id,
            'password' => 'nullable|confirmed|min:8',
            'jabatan' => 'required',
        ],[
            'nama.required'       => 'Nama wajib diisi',
            'email.required'      => 'Email wajib diisi',
            'email.unique'        => 'Email sudah terdaftar',
            'password.confirmed'  => 'Password tidak sama',
            'password.min'        => 'Password harus minimal 8 karakter',
            'jabatan.required'    => 'Jabatan wajib diisi',
        ]);

        $user = User::findOrFail($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user')->with('success','Data Berhasil Diupdate');

    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success','Data Berhasil Dihapus');
    }
}
