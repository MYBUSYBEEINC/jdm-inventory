<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategory;

class Category extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory', 'subcategory_id', 'id');
    }

    public function sub($id)
    {
        // return $this->hasMany('App\Subcategory');
        $post_like = new Subcategory;
        return $post_like->where('category_id', $id)->get();
    }
}