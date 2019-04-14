<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Author;
use App\Http\Requests\AuthorFormValidation;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(10);
        $title = 'Authors';
        $custom_cat = 'authors';
        return view('admin.backend.authors.authors',compact('authors', 'title', 'custom_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Author';
        $custom_cat = 'authors';
        return view('admin.backend.authors.authorForm',compact('title','custom_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorFormValidation $request)
    {
        $author = new Author;
        $file = $request->file('image');
        if(!empty($request->file('image'))){
            if($file->move('uploads', $file->getClientOriginalName())){ 
                $input = $request->all();
                array_pop($input);
                $input['image'] = $file->getClientOriginalName();
                $author->fill($input)->save();
                return redirect()->route('authors.index')
                    ->with('success','Author Created Successfully');                
            } 
        }
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
        $author = Author::findOrFail($id);
        $author = $author->toArray();
        $title = 'Edit Author';
        $custom_cat = 'authors';
        return view('admin.backend.authors.authorEdit', compact('author','title','custom_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorFormValidation $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $authorStatus = Author::find($id)->forcedelete(); // Hard Delete
        $authorStatus = Author::find($id)->delete();
        if($authorStatus){
            return redirect()->route('authors.index')
                 ->with('success','Author Updated Successfully');
        }else{
            return back()->with('error','Author can not be deleted');            
        }
    }
   
}