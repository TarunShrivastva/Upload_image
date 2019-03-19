<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\ArticleCategory;
use App\Http\Requests\ArticleCategoryFormValidation;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article_cats = ArticleCategory::all();
        $title = 'Article Content Type';
        return view('admin.backend.articles.article_content_type.content-type',compact('article_cats', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Article Content Type Create';
        return view('admin.backend.articles.article_content_type.contentTypeForm',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCategoryFormValidation $request)
    {
        $articleCategory = new ArticleCategory;
        $input = $request->all();
        $articleCategory->fill($input)->save();
        return redirect()->route('contenttype.index')->with('success','Article Created Successfully');
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
        $articleCategory = ArticleCategory::findOrFail($id);
        $articleCategory = $articleCategory->toArray();
        $title = 'Edit Article Content Type';
        return view('admin.backend.articles.article_content_type.contentTypeEdit', compact('articleCategory','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleCategoryFormValidation $request, $id)
    {
        $articleCategory = ArticleCategory::findOrFail($id);
        $input = $request->all();
        $articleCategory->fill($input)->save();
        return redirect()->route('contenttype.index')
                 ->with('success','Article Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articleCategory = new ArticleCategory;
        $articleStatus = articleCategory::find($id)->forcedelete(); // Hard Delete
        // $Categorystatus = Module::find($id)->delete();
        if($articleStatus){
            return redirect()->route('contenttype.index')
                 ->with('success','Articles Updated Successfully');
        }else{
            return back()->with('error','Articles can not be deleted');            
        }
    }
}
