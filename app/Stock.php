<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product',
        'quantity',
        'unit_price',
        'discount',
        'total'
    ];
}
