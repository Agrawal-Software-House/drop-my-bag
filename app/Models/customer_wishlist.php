<?php

namespace App\Models;

use App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer_wishlist extends Model
{
    protected $fillable = ['customer_id','product_id'];

    use HasFactory, SoftDeletes;

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
