<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'menus';

    public function articles()
    {
        return $this->hasMany(Article::class,'a_menu_id');
    }
}
