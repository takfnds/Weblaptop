<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'products';

    const HOT = 1;

    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class,'products_keywords','pk_product_id','pk_keyword_id');
    }
}
