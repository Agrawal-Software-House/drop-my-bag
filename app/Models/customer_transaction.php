<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer_transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_method_id',
    ];
}
