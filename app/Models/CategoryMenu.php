<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMenu extends Model
{
    use HasFactory;

    protected $table = 'category_menu';

    protected $fillable = ['name'];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_category_menu');
    }
}
