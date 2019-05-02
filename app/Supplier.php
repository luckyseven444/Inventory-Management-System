<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'address',
        'code'
    ];
}
