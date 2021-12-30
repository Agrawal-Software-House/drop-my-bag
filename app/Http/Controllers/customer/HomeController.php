<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    
    public function index()
    {
        $categories = Category::where('active',1)->whereHas('product', function ($query) {
                            $query->where('product_status_type_id', 2);
                        })
                        ->get();
        return view('customer.home',compact('categories'));
    }

    public function showCategoryPage(Request $request,$slug)
    {
    	$category = Category::where('slug',$slug)->first();

        $products = $category->product();

        //search queries 

        $selected_sub_category = $request->sub_category;
        $selected_brand = $request->brand;
        $selected_returnable = $request->has('returnable');
        $selected_min_price = $request->min_price;
        $selected_max_price = $request->max_price;

        if ($request->sub_category) {
            $products->where('sub_category_id', $request->sub_category);
        }

        if ($request->brand) {
            $products->whereIn('brand_name', $request->brand);
        }

        if ($request->has('returnable')) {
            $products->where('returnable', $request->has('returnable'));
        }

        if ($request->min_price) {
            $products->where('selling_price', '>=' , $request->min_price);
        }

        if ($request->max_price) {
            $products->where('selling_price', '<=' , $request->max_price);
        }

        $products = $products->paginate(10)->appends([
                        'sub_category' => $request->sub_category,
                        'brand' => $request->brand,
                        'returnable' => $request->has('returnable'),
                        'min_price' => $request->min_price,
                        'max_price' => $request->max_price
                    ]);

        $brand_names = product::where('category_id', $category->id)
                                ->pluck('brand_name')
                                ->unique()
                                ->toArray();

    	if ($category) {
    		return view('customer.singleCategory',
                compact(
                    'category',
                    'products',
                    'brand_names',
                    'selected_sub_category',
                    'selected_brand',
                    'selected_returnable',
                    'selected_min_price',
                    'selected_max_price',

                ));
    	}

        abort(404);
    }
    
    public function showProductPage($category_slug, $product_slug, $product_id)
    {
        $product = product::where(
            [
                'slug' => $product_slug,
                'id' => Crypt::decryptString($product_id),
            ]
        )
        ->where('product_status_type_id', '!=', 1)
        ->whereHas('category',function ($query) use ($category_slug) {
                            $query->where('slug', $category_slug);
                        })
        ->first();

        if ($product) {
            $similar_products = product::where([
                'category_id' => $product->category_id,
                'sub_category_id' => $product->sub_category_id,
            ])
            ->where('id', '!=', $product->id)
            ->where('product_status_type_id', '!=', 1)
            ->take(5)->get();
            return view('customer.singleProduct',compact('product','similar_products'));
        }
        abort(404);
    }
}
