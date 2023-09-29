<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supllier_id',
        'purchase_number',
        'purchase_date',
        'subTotal',
        'vat',
        'vat_amount',
        'discount',
        'discount_amount',
        'discount_note',
        'total_amount',
        'payable_amount',
        'payable_type',
        'payable_note',
        'userId',
        'branchId',
    ];
}
