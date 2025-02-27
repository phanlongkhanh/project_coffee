<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MyAccountController extends Controller
{
    public function account()
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $accounts = auth()->user();

        return response()->json(compact('accounts'));
    }

}
