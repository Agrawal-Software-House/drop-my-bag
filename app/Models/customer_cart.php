<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class customer_cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','product_id','quantity'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
