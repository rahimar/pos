<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id',
        'payable_amount',
        'payable_type',
        'payable_note',
        'userId',
        'branchId',
    ];
}
