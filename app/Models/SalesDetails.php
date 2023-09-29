<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id',
        'category_id',
        'product_id',
        'unit_id',
        'quantity',
        'rate',
        'product_discount',
        'product_discount_amount',
        'product_total_amount',
        'userId',
        'branchId',
    ];
}
