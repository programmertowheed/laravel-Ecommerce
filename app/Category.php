<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','publication_status','category_description','category_image','parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
