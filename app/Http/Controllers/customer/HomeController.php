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

    public function showCategoryPage($slug)
    {
        
    	$category = Category::where('slug',$slug)->first();
        $products = $category->product()->paginate(10);
    	if ($category) {
    		return view('customer.singleCategory',compact('category','products'));
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
        )->whereHas('category',function ($query) use ($category_slug) {
                            $query->where('slug', $category_slug);
                        })->first();

        $similar_products = product::where([
            'category_id' => $product->category_id,
            'sub_category_id' => $product->sub_category_id,

        ])
        ->where('id', '!=', $product->id)
        ->take(5)->get();

        if ($product) {
            return view('customer.singleProduct',compact('product','similar_products'));
        }
        abort(404);
    }
}
