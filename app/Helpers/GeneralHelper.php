<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
/**
 * Class GeneralHelper
 *
 * @package App\Helpers
 */
abstract class GeneralHelper
{

    /**
     * Check For Authentication
     *
     * @return bool
     */

    public static function GET_ALL_CATEGORY() {
        return Category::where('active',1)->get();
    }

    public static function GET_ALL_CATEGORY_WITH_ACTIVE_PRODUCT() {
        return Category::where('active',1)->whereHas('product', function ($query) {
                            $query->where('product_status_type_id', 2);
                        })
                        ->whereHas('subCategory', function ($query) {
                            $query->where('active', 1);
                        })
                        ->get();
    }

    public static function GET_ALL_SUB_CATEGORY() {
        return SubCategory::all();
    }

    public static function GET_CURRENT_CUSTOMER() {
        return Auth::guard('customer')->user();
    }
}
