<?php

namespace App\Models;

use App\Models\customer_order;
use App\Models\customer_address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer_transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_method_id',
        'order_no',
        'customer_address_id',
        'customer_id',
    ];

    public function orders()
    {
        return $this->hasMany(customer_order::class);
    }

    public function address()
    {
        return $this->belongsTo(customer_address::class,'customer_address_id');
    }
}
