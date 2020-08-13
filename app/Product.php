<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }
    public function classification()
    {
        return $this->belongsTo('App\Classification', 'classification_id', 'id');
    }
    public function color()
    {
        return $this->belongsTo('App\Color', 'color_id', 'id');
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unit_id', 'id');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory', 'sub_category_id', 'id');
    }
    public function subsubcategory()
    {
        return $this->belongsTo('App\SubSubCategory', 'subsubcategory_id', 'id');
    }
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }
}