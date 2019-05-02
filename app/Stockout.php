<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockout extends Model
{
    protected $table = 'stockout';
    protected $primaryKey = 'id';
    protected $fillable = [
        'challan_out_id',
        'customer_id',
        'product_id',
        'selling_quantity',
        'selling_unit_price',

    ];

}
