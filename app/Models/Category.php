<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'categories';
    const HOT = 1;

    public function parent()
    {
        return $this->belongsTo(Category::class,'c_parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class,'c_parent_id');
    }
}
