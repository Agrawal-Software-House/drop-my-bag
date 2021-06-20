<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'active' => $request->has('active'),
        ];
        if($request->hasFile('image'))
        {
            $data['image'] = $request->image->store('category');
        }
        Category::create($data);

        $data = array(
            'success' => 'uploaded',
        );
        echo json_encode($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$category->id,
            'image' => 'nullable|mimes:jpeg,jpg,png',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'active' => $request->has('active'),
        ];

        if($request->hasFile('image'))
        {
            $data['image'] = $request->image->store('category');
        }

        $category->update($data);
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        $data = array(
            'success' => 'deleted',
        );
        echo json_encode($data);
    }
}
