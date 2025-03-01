<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryMenu;

class RemoveCategoryMenuController extends Controller
{
    public function destroy($id)
    {
        $categorys_menus = CategoryMenu::find($id);
        
        if (!$categorys_menus) {
            return response()->json(['message' => 'Không tìm thấy menu'], 404);
        }

        $categorys_menus->delete();

        return response()->json(['message' => 'Xóa menu thành công']);
    }
}
