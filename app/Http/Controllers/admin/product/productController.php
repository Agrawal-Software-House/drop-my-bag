<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $data = view('admin.product.component.approve',compact('product'))->render();
        return response()->json(array('success' => true, 'view'=>$data));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        if (request('query') == 'approve_product') {
            $product->update([
                'product_status_type_id' => 2,
            ]);
        }

        if (request('query') == 'disapprove_product') {
            $this->validate($request, [
                'note' => 'required',
            ]);
            $product->update([
                'product_status_type_id' => 3,
                'admin_note' => $request->note,
            ]);
        }

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
    public function destroy(product $product)
    {
        $product->delete();
        $data = array(
            'success' => 'deleted',
        );
        echo json_encode($data);
    }
}
