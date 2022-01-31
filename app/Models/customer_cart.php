<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer_cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['customer_id','product_id','quantity'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
