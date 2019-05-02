<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challan extends Model
{
    protected $table = 'challan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'challan',
        'cost',
        'supplier_id',
        
    ];
}
