<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Module;
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
        $category = Module::where('parent_id', '=', 0)->get();
        $title = 'Category';
        return view('admin.backend.category.category',compact('category', 'title'));
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
        $categories = Module::where('parent_id', '=', 0)->get();
        foreach ($categories as $category) 
            $catName[$category->id] = $category->name;
        return view('admin.backend.category.categoryForm',compact('catName','title'));
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
        $module = Module::findOrFail($id);
        $module = $module->toArray();
        $title = 'Edit Category';
        $categories = Module::where('parent_id', '=', 0)->where('id', '<>', $module['id'])->get();
        $catName = array( 0 => 'Select Parent Category');
        foreach ($categories as $category) {
            $catName[$category->id] = $category->name;
        }
        return view('admin.backend.category.categoryEdit', compact('module','title','catName'));
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
        $module = new Module;
        $Categorystatus = Module::find($id)->forcedelete(); // Hard Delete
        // $Categorystatus = Module::find($id)->delete();
        if($Categorystatus){
            return redirect()->route('category.index')
                 ->with('success','Category Updated Successfully');
        }else{
            return back()->with('error','Category can not be deleted');            
        } 
    }
}
