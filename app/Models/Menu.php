<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    protected $table = 'menu';

    protected $fillable = ['name', 'image', 'amount', 'price', 'id_category_menu'];


    public function category()
    {
        return $this->belongsTo(CategoryMenu::class, 'id_category_menu');
    }

}
