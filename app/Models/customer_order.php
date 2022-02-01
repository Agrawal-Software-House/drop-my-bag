<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer_order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'amount',
        'gst',
        'grand_amount',
        'customer_address_id',
        'customer_transaction_id',
        'customer_id',
        'order_no',
    ];
}
