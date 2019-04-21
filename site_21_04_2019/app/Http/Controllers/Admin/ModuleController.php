<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Module;
use App\User;
use Auth;
use App\Http\Requests\CategoryFormValidation;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::paginate(8);
        $title = 'Category';
        $custom_cat = 'module';
        return view('admin.backend.module.module',compact('modules', 'title', 'custom_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catName = array( 0 => 'Select Parent Category');
        $title = 'Module';
        $custom_cat = 'module';
        $modules = Module::where('parent_id', '=', 0)->get();
        foreach ($modules as $module) 
            $catName[$module->id] = $module->name;
        return view('admin.backend.module.moduleForm',compact('catName','title', 'custom_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $module = new Module;
        $input = $request->all();
        $module->fill($input)->save();
        if(isset($module->id))
        $user->module()->attach($module->id, ['can_edit' => 1, 'can_add' => 1, 'can_delete' => 1]);
        
        return redirect()->route('module.index')
                 ->with('success','Module Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $title = 'Edit Module';
        $custom_cat = 'module'; 
        $modules = Module::where('parent_id', '=', 0)->where('id', '<>', $module['id'])->get();
        $catName = array( 0 => 'Select Parent Category');
        foreach ($modules as $modul) {
            $catName[$modul->id] = $modul->name;
        }
        return view('admin.backend.module.moduleEdit', compact('module','title','catName','custom_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = new Module;
        $module = Module::findOrFail($id);
        $input = $request->all();
        $module->fill($input)->save();
        return redirect()->route('module.index')
                 ->with('success','Module Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moduleStatus = Module::find($id)->delete();
        if($moduleStatus){
            return redirect()->route('module.index')
                 ->with('success','Module Updated Successfully');
        }else{
            return back()->with('error','Module can not be deleted');            
        }
    }
}
