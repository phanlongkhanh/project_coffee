<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryMenu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class CategoryMenuController extends Controller
{
    public function index()
    {
        $category_menus = CategoryMenu::all();
        return view('admin.category.menu.index', compact('category_menus'));
    }

    public function create()
    {
        return view('admin.category.menu.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        CategoryMenu::create([
            'name' => $request->name,
        ]);

        return redirect()->route('index-category-menu')->with('success', 'Danh mục đã được thêm thành công!');
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

        $category_menus = CategoryMenu::find($id);

        if (!$category_menus) {
            return redirect()->route('index-menu')->with('error', 'Không tìm thấy sản phẩm với ID này.');
        }

        return view('Admin.category.menu.update', compact('user', 'category_menus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = CategoryMenu::find($id);

        if (!$category) {
            return redirect()->route('index-category-menu')->with('error', 'Danh mục không tồn tại!');
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->route('index-category-menu')->with('success', 'Cập nhật danh mục thành công!');
    }
}
