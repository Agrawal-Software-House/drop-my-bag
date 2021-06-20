<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('merchant', ['except' => 'logout']);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = [
            'product_name' => $request->product_name,
            'slug' => str_slug($request->product_name),
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'brand_name' => $request->brand_name,
            'mrp_price' => $request->mrp_price,
            'selling_price' => $request->selling_price,
            'piece' => $request->piece,
            'returnable' => $request->has('returnable'),
            'specification' => $request->specification,
            'product_status_type_id' => 1,
            'active' => 0,
            'merchant_id' => Auth::guard('merchant')->id(),
        ];

        if($request->hasFile('product_image'))
        {
            $data['product_image'] = $request->product_image->store('product');
        }
        product::create($data);
        
        $data = array(
            'success' => 'uploaded',
        );
        echo json_encode($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('merchant.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request,product $product)
    {
        $data = [
            'product_name' => $request->product_name,
            'slug' => str_slug($request->product_name),
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'brand_name' => $request->brand_name,
            'mrp_price' => $request->mrp_price,
            'selling_price' => $request->selling_price,
            'piece' => $request->piece,
            'returnable' => $request->has('returnable'),
            'specification' => $request->specification,
            'product_status_type_id' => 1,
        ];

        if($request->hasFile('product_image'))
        {
            $data['product_image'] = $request->product_image->store('product');
        }
        $product->update($data);
        
        $data = array(
            'success' => 'uploaded',
        );
        echo json_encode($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::find($id)->delete();
        $data = array(
            'success' => 'deleted',
        );
        echo json_encode($data);
    }
}
