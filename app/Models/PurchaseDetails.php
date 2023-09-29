<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
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
