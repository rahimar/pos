<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateSms extends Model
{
    use HasFactory;

    protected $fillable = [
        'sms_title',
        'sms_body',
        'status',
        'branchId',
    ];
}
