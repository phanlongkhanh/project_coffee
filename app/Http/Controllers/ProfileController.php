<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(){
        $users = auth()->user();

        return view('user.account.index',compact('users'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255|regex:/\S/',
            'email' => 'required|email|regex:/\S/|max:50|unique:users,email,' . $user->id,
            'phone' => [
                'required',
                'string',
                'max:11',
                'regex:/^0[0-9]{9,11}$/',
                'not_regex:/^(0{10,12}|1{10,12}|2{10,12}|3{10,12}|4{10,12}|5{10,12}|6{10,12}|7{10,12}|8{10,12}|9{10,12})$/', // Không phải chuỗi số giống nhau
                'regex:/^\S+$/',
            ],
            'address' => 'nullable|string|max:255|regex:/\S/',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('user-image'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('index-profile')->with('success', 'Cập nhật thông tin thành công!');
    }

    public function UpdateImage(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return view()->route('login')->with('error', 'Bạn Chưa đăng nhập');
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('user-image'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('index-profile')->with('success', 'Cập nhật thông tin thành công!');
    }

}
