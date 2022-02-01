<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\product;

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
        'customer_transaction_id',
        
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
