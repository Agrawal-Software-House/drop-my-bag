<?php

namespace App\Models;

use App\Models\SubCategory;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','active','slug'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function subCategoryWithActiveProduct()
    {
        return $this->hasMany(SubCategory::class)
                    ->where('active',1)
                    ->whereHas('product', function ($query) {
                        $query->where('product_status_type_id', 2);
                    });
    }


    public function product()
    {
        return $this->hasMany(product::class);
    }
 
}
