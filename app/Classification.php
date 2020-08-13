<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory', 'subcategory_id', 'id');
    }
}
