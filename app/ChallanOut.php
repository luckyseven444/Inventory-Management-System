<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallanOut extends Model
{
    protected $table = 'challan_out';
    protected $primaryKey = 'id';
    protected $fillable = [
        'challan',
        'customer_id',
        'payment'
    ];
}
