<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Article;
use App\AdminModel\ArticleCategory;
use App\Http\Requests\ArticleFormValidation;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $title = 'Articles';
        return view('admin.backend.articles.article.article',compact('articles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contentName = array( 0 => 'Select Content Types');
        $title = 'Article';
        $content_types = ArticleCategory::where('status', '1')->get();
        foreach ($content_types as $content_type) 
            $contentName[$content_type->id] = $content_type->content_type_name;
        return view('admin.backend.articles.article.articleForm',compact('title','contentName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleFormValidation $request)
    {
        $article = new Article;
        $file = $request->file('image');
        if(!empty($request->file('image'))){
            if($file->move('uploads', $file->getClientOriginalName())){ // image upload in public/upload folder.
                $input = $request->all();
                array_pop($input);
                $input['image'] = $file->getClientOriginalName();
                $article->fill($input)->save();
                return redirect()->route('articles.index')
                    ->with('success','Article Created Successfully');                
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
        $contentName = array( 0 => 'Select Content Types');
        $content_types = ArticleCategory::where('status', '1')->get();
        foreach ($content_types as $content_type) 
            $contentName[$content_type->id] = $content_type->content_type_name;
        $article = Article::findOrFail($id);
        $article = $article->toArray();
        $title = 'Edit Article';
        return view('admin.backend.articles.article.articleEdit', compact('article','title','contentName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleFormValidation $request, $id)
    {
        $article = Article::findOrFail($id);
        $file = $request->file('image');
        if(!empty($request->file('image'))){
            if($file->move('uploads', $file->getClientOriginalName())){ // image upload in public/upload folder.
                $input = $request->all();
                array_pop($input);
                $input['image'] = $file->getClientOriginalName();
                $article->fill($input)->save();
                return redirect()->route('articles.index')
                    ->with('success','Article Created Successfully');                
            } 
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = new Article;
        $articleStatus = article::find($id)->forcedelete(); // Hard Delete
        // $Categorystatus = Module::find($id)->delete();
        if($articleStatus){
            return redirect()->route('articles.index')
                 ->with('success','Articles Updated Successfully');
        }else{
            return back()->with('error','Articles can not be deleted');            
        }
    }
}
