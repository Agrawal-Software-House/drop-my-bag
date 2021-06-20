<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;
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
    
    public function showProductPage($category_slug, $product_slug)
    {
        $product = product::where('slug',$product_slug)->whereHas('category',function ($query) use ($category_slug) {
                            $query->where('slug', $category_slug);
                        })->first();
        if ($product) {
            return view('customer.singleProduct',compact('product'));
        }
    }
}
