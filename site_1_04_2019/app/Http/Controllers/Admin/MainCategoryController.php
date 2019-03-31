<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Module;
use App\User;
use Auth;
use App\Http\Requests\CategoryFormValidation;


class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Module::where('parent_id', '=', 0)->get();
        $title = 'Main Category';
        $custom_cat = 'main_category';
        return view('admin.backend.main_category.mainCategory',compact('category', 'title', 'custom_cat'));
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
        $custom_cat = 'main_category';
        return view('admin.backend.main_category.mainCategoryForm',compact('title', 'custom_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormValidation $request)
    {
        $user = User::find(Auth::user()->id);
        $module = new Module;
        $input = $request->all();
        $module->fill($input)->save();
        if(isset($module->id))
        $user->module()->attach($module->id, ['can_edit' => 1, 'can_add' => 1, 'can_delete' => 1]);
        
        return redirect()->route('main_category.index')
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
        $module = Module::findOrFail($id);
        $module = $module->toArray();
        $title = 'Edit Category';
        $custom_cat = 'main_category'; 
        return view('admin.backend.main_category.mainCategoryEdit', compact('module','title'));
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
        $module = new Module;
        $module = Module::findOrFail($id);
        $input = $request->all();
        $module->fill($input)->save();
        return redirect()->route('main_category.index')
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
        $mainCategorystatus = Module::find($id)->delete();
        if($mainCategorystatus){
            return redirect()->route('main_category.index')
                 ->with('success','Category Updated Successfully');
        }else{
            return back()->with('error','Category can not be deleted');            
        } 
    }
}
