<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.admin.index',[
            'title'=>'Dashboard Admin',
            'company'=>'KitaBantu'
        ]);
    }
}
