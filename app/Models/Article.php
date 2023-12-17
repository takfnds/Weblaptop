<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'articles';

    public function menu()
    {
        return $this->belongsTo(Menu::class,'a_menu_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'articles_tags','at_article_id','at_tag_id');
    }
}
