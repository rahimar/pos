<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_barcode',
        'product_code',
        'product_generic',
        'product_type',
        'brand_id',
        'category_id',
        'unit_id',
        'status',
        'branchId',
    ];
}
