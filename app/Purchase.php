<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
    }
    public function reqbranch()
    {
        return $this->belongsTo('App\Branch', 'req_branch', 'id');
    }
    public function delbranch()
    {
        return $this->belongsTo('App\Branch', 'del_branch', 'id');
    }
    public function order()
    {
        return $this->hasMany('App\Order', 'po_number', 'po_number');
    }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}