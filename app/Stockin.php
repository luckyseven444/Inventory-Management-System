<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockin extends Model
{
    protected $table = 'stockin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'lot',
        'product_id',
        'supplier_id',
        'unit_price',
        'quantity',
        'current_quantity',
        'discount',
        'cost',
        'challan_id'
    ];
    
    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
    
    public function suppliers()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
    }

    public function challans()
    {
        return $this->belongsTo('App\Challan', 'challan_id', 'id');
    }
}
