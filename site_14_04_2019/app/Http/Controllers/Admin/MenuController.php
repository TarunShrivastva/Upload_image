<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Menu;
use App\User;
use Auth;
use App\Http\Requests\CategoryFormValidation;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        $title = 'Front Module';
        $custom_cat = 'front-module';
        return view('admin.backend.menu.menu',compact('menus', 'title', 'custom_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catName = array( 0 => 'Select Parent Category');
        $title = 'Front Module';
        $custom_cat = 'front-module';
        $categories = Menu::where('parent_id', '=', 0)->get();
        foreach ($categories as $category)
            $catName[$category->id] = $category->name;
        return view('admin.backend.menu.menuForm',compact('title', 'custom_cat', 'catName'));
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
        $menu = new Menu;
        $input = $request->all();
        $menu->fill($input)->save();
        return redirect()->route('front-module.index')
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
        $module = Menu::findOrFail($id);
        $module = $module->toArray();
        $title = 'Edit Category';
        $custom_cat = 'front-module';
        $categories = Menu::where('parent_id', '=', 0)->where('id', '<>', $module['id'])->get();
        foreach ($categories as $category)
            $catName[$category->id] = $category->name; 

        // $content_types = ArticleCategory::where('status', '1')->get();
        // $categories = Category::where('parent_id', '=', 0)->get();
        // $subcategories = Category::where('parent_id', '<>', 0)->get();
        
        // $authors = Author::where('status', '1')->get();
        // foreach ($content_types as $content_type) 
        //     $contentName[$content_type->id] = $content_type->content_type_name;
        
        // foreach ($categories as $category)
        //     $contentName2[$category->id] = $category->name;
        
        // foreach ($authors as $author)   
        //     $contentName3[$author->id] = $author->author;


        return view('admin.backend.menu.menuEdit', compact('module','title','custom_cat','catName'));
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
        $module = new Menu;
        $module = Menu::findOrFail($id);
        $input = $request->all();
        $module->fill($input)->save();
        return redirect()->route('front-module.index')
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
        $mainCategorystatus = Menu::find($id)->delete();
        if($mainCategorystatus){
            return redirect()->route('front-module.index')
                 ->with('success','Category Updated Successfully');
        }else{
            return back()->with('error','Category can not be deleted');            
        } 
    }
}
