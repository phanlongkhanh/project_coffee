<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;


class RemoveMenuController extends Controller
{
    public function destroy($id)
    {
        $menu = Menu::find($id);
        
        if (!$menu) {
            return response()->json(['message' => 'Không tìm thấy menu'], 404);
        }

        $menu->delete();

        return response()->json(['message' => 'Xóa menu thành công']);
    }
}
