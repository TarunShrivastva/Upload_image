<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Category;
use App\User;
use Auth;
use App\Http\Requests\CategoryFormValidation;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $title = 'Category';
        $custom_cat = 'category';
        return view('admin.backend.category.category',compact('category', 'title', 'custom_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catName = array( 0 => 'Select Parent Category');
        $title = 'Category';
        $custom_cat = 'category';
        $categories = Category::where('parent_id', '=', 0)->get();
        foreach ($categories as $category) 
            $catName[$category->id] = $category->name;
        return view('admin.backend.category.categoryForm',compact('catName','title', 'custom_cat'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormValidation $request)
    {
        $category = new Category;
        $input = $request->all();
        $category->fill($input)->save();
        if(!isset($category->id)){
            return back()->with('error','Category can not be Created');
        } 
        return redirect()->route('category.index')
                ->with('success','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catName = array( 0 => 'Select Parent Category');
        $title = 'Edit Category';
        $custom_cat = 'category'; 
        
        $category = Category::findOrFail($id);
        $category = $category->toArray();
        $categories = Category::where('parent_id', '=', 0)->where('id', '<>', $category['id'])->get();
        foreach ($categories as $category1) {
            $catName[$category1->id] = $category1->name;
        }
        return view('admin.backend.category.categoryEdit', compact('category','title','catName','custom_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormValidation $request, $id)
    {
        $category = Category::findOrFail($id);
        $input = $request->all();
        $category->fill($input)->save();
        return redirect()->route('category.index')
                 ->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Categorystatus = Module::find($id)->delete();
        if($Categorystatus){
            return redirect()->route('category.index')
                 ->with('success','Category Updated Successfully');
        }else{
            return back()->with('error','Category can not be deleted');            
        } 
    }
}
