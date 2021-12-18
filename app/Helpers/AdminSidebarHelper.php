<?php

namespace App\Helpers;

use App\Models\Category;
use App\Customer;
use App\Models\SubCategory;
use App\Models\product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
/**
 * Class AdminSidebarHelper
 *
 * @package App\Helpers
 */
abstract class AdminSidebarHelper
{

    /**
     * Check For Authentication
     *
     * @return bool
     */

    public static function CATEGORY_COUNT() {
        return Category::all()->count();
    }


    public static function SUB_CATEGORY_COUNT() {
        return SubCategory::all()->count();
    }

    public static function PRODUCT_COUNT($status) {
        return product::where('product_status_type_id', $status)->count();
    }

    public static function CUSTOMER_COUNT() {
        return Customer::all()->count();
    }

}
