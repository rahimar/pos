<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendSms extends Model
{
    use HasFactory;

    protected $fillable = [
        'sms_id',
        'sms_number',
        'sms_body',
        'userId',
        'branchId',
    ];
}
