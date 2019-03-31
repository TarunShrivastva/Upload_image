<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Article;
use App\AdminModel\Module;
use App\AdminModel\Author;
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
        $articles = Article::paginate(8);
        $title = 'Articles';
        $custom_cat = 'articles';
        return view('admin.backend.articles.article.article',compact('articles', 'title','custom_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contentName = array( 0 => 'Select Content Types');
        $contentName2 = array( 0 => 'Select Category');
        $contentName3 = array( 0 => 'Select Author');
        $title = 'Article';
        $custom_cat = 'articles';
        $content_types = ArticleCategory::where('status', '1')->get();
        $categories = Module::where('parent_id', '<>', 0)->get();
        $authors = Author::where('status', '1')->get();
        foreach ($content_types as $content_type) 
            $contentName[$content_type->id] = $content_type->content_type_name;
        
        foreach ($categories as $category)
            $contentName2[$category->id] = $category->name;
        
        foreach ($authors as $author)   
            $contentName3[$author->id] = $author->author; 
            
        return view('admin.backend.articles.article.articleForm',compact('title','contentName','contentName2','contentName3','custom_cat'));
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
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $validatingRequest = array();
        if( $request->file('image') != null ){
            $validatingRequest = [
                    'title' =>  'required|unique:articles,title,NULL,id,deleted_at,NULL',
                    'image' =>  'required|mimes:jpg,jpeg,png'
                ];
        }elseif( $request->file('image') == null && ($article['image'] != null) ) {
            $validatingRequest = [
                    'title' =>  'required',
                ];
        }elseif( $request->file('image') == null && ($article['image'] == null)){
            $validatingRequest = [
                    'title' =>  'required|unique:articles,title,NULL,id,deleted_at,NULL',
                    'image' =>  'required|mimes:jpg,jpeg,png'
                ];
        }
        $this->validate($request, $validatingRequest);
        $article = Article::findOrFail($id);
        $file = $request->file('image');
        if(!empty($request->file('image'))){
            if($file->move('uploads', $file->getClientOriginalName())){ // image upload in public/upload folder.
                $input = $request->all();
                array_pop($input);
                $input['image'] = $file->getClientOriginalName();
                $article->update($input);
                return redirect()->route('articles.index')
                    ->with('success','Article Created Successfully');                
            } 
        }else{
            return redirect()->route('articles.index')
                    ->with('success','Article Created Successfully');
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
        //$articleStatus = article::find($id)->forcedelete(); // Hard Delete
        $articleStatus = Article::find($id)->delete();
        if($articleStatus){
            return redirect()->route('articles.index')
                 ->with('success','Articles Updated Successfully');
        }else{
            return back()->with('error','Articles can not be deleted');            
        }
    }

    public function statusUpdate(Request $request)
    {
        
          $id = $request->id; 
        $type = $request->type;
        $value = $request->value;
        $model = $request->model;
        $model = "App\AdminModel\\$model";
        $success = $model::findOrFail($id)->update(["$type"=> ($value == 1)?'0':'1']);
        if($success)
            echo "update";
        else
            echo "fail";
    }

}