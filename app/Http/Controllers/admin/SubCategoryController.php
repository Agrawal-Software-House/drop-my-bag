<?php

namespace App\Http\Controllers\admin;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }

    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sub-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        SubCategory::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'category_id' => $request->category,
            'active' => $request->has('active'),
        ]);

        $data = array(
            'success' => 'uploaded',
        );
        echo json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        return view('admin.sub-category.edit',compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request, [
            'name' => 'required|unique:sub_categories,name,'.$subCategory->id,
            'category' => 'required',
        ]);


        $update = $subCategory->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'category_id' => $request->category,
            'active' => $request->has('active'),
        ]);

        $message = $update ? 'Sub Category updated successfully!' : 'Technical Issue!';
        
        $data = array(
            'message' => $message,
        );
        echo json_encode($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        $data = array(
            'success' => 'deleted',
        );
        echo json_encode($data);
    }
}
