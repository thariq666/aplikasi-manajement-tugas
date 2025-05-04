<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Dashboard',
            'menuDashboard' => 'active',
            'totalUser' => User::count(),
            'totalAdmin'    => User::where('jabatan','Admin')->count(),
            'totalKaryawan'    => User::where('jabatan','Karyawan')->count(),
            'totalTugas'    => User::where('is_tugas',true)->count(),
            'totalBelumTugas'    => User::where('is_tugas',false)->count(),
        );
        return view('dashboard', $data);
    }
}
