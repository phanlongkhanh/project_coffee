<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayOutController extends Controller
{
    public function index_admin(){
        return view('layout.admin');
    }
}
