<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory', 'subcategory_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
