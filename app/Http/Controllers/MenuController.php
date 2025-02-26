<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\CategoryMenu;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index',compact('menus'));
    }

    public function create()
    {
        $categorys = CategoryMenu::all();
        return view('admin.menu.create',compact('categorys'));
    }

    public function update()
    {
        return view('admin.menu.update');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/\S/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'id_category_menu' => 'required|exists:category_menu,id',
        ]);
        
        try {
            // Xử lý ảnh đại diện
            $imagePath = 'profile.jpg'; // Ảnh mặc định nếu không có ảnh
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/menu'), $imageName);
                $imagePath = 'menu/' . $imageName;
            }

            Menu::create([
                'name' => $validated['name'],
                'image' => $imagePath,
                'amount' => $validated['amount'],
                'price' => $validated['price'],
                'id_category_menu' => $validated['id_category_menu'],
            ]);

            return redirect()->route('index-menu')->with('success', 'Menu đã được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi thêm menu: ' . $e->getMessage());
        }
    }

}
