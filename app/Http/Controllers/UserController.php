<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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

        if ($request->jabatan=='admin'){
            $user->is_tugas = false;
            $user->tugas()->delete();
        }

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

    public function excel(){
        $filename = now()->format('d-m-Y_H.i.s').'_user';
        return Excel::download(new UserExport, 'DataUser_'.$filename. '.xlsx');
    }

    public function pdf(){
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
          'user' => User::get(), 
          'tanggal'  =>  now()->format('d-m-Y'),
          'time'  =>  now()->format('H:i:s'), 
        );
        $pdf = Pdf::loadView('admin/user/pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataUser_'.$filename. '.pdf');
    }
}
