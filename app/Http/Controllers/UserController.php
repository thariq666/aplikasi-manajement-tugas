<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $data = array(
            'title'             => 'Data User',
            'menuAdminUser'     => 'active',
        );
        return view('admin/user/index',$data);
    }
}
