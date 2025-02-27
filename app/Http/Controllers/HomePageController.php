<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index(){

        $users = auth()->user();
        $products = Menu::paginate(9);
        return view('user.homepage.index',compact('products','users'));
    }
}
