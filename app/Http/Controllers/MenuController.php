<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\CategoryMenu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;



class MenuController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
        $categorys = CategoryMenu::all();
        return view('admin.menu.create', compact('categorys'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/\S/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
                'price' => $validated['price'],
                'id_category_menu' => $validated['id_category_menu'],
            ]);

            return redirect()->route('index-menu')->with('success', 'Menu đã được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi thêm menu: ' . $e->getMessage());
        }
    }

    public function edit($encryptedId)
    {
        $user = auth()->user();

        if (!$user || $user->id_role != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('index-menu')->with('error', 'ID sản phẩm không hợp lệ.');
        }

        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->route('index-menu')->with('error', 'Không tìm thấy sản phẩm với ID này.');
        }

        $categorymenus = CategoryMenu::all();

        return view('Admin.menu.update', compact('user', 'menu', 'categorymenus'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'id_category_menu' => 'required|',
            'price' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu->name = $request->name;
        $menu->id_category_menu = $request->id_category_menu;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($menu->image && file_exists(public_path('images/' . $menu->image))) {
                unlink(public_path('images/' . $menu->image));
            }

            // Lưu ảnh mới
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $menu->image = $imageName;
        }

        $menu->save();

        return redirect()->route('index-menu')->with('success', 'Cập nhật món thành công!');
    }

}
