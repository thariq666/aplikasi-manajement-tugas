<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    function index(){
        $data = array(
            'title'             => 'Data Tugas',
            'TugasAdminUser'     => 'active',
        );
        return view('admin/tugas/index',$data);
    }
}
