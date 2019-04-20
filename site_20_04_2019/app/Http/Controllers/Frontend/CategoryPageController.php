<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Article;
use App\AdminModel\Content;
use App\AdminModel\Category;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App;
use MetaTag;

class CategoryPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category, $subcategory='')
    {
        // $data = App::call('App\Http\Controllers\Admin\ArticleController@test');
        $agent = new Agent();
        $device = $agent->isMobile();
        // App::setLocale($locale);

        MetaTag::set('description', 'All about this detail page');
        MetaTag::set('image', asset('images/detail-logo.png'));

        $category = Category::where('status','1')->where('url', '=', $category)->get();
        $articles = '';
        if(count($category)>0){
            if($subcategory){
                MetaTag::set('title', 'Sub Category');     
                $subcategory = Content::where('status','1')->where('content_type_name', '=',  $subcategory)->get();
                $articles = Article::where('status','1')->where('category_id','=',$category[0]->id)->where('content_id','=',$subcategory[0]->id)->with('author','content')->paginate(8);
            }else{
                MetaTag::set('title', 'Category');
                $articles = Article::where('status','1')->where('category_id','=',$category[0]->id)->with('author','content')->paginate(8);
            }
            $recentArticles = $this->recentArticles();
            $trendingArticles = $this->trendingArticles();
            if($subcategory){
                return view('frontend.content.category.subCatContent',compact('articles','recentArticles','trendingArticles','device'));    
            }
                return view('frontend.content.category.mainContent',compact('articles','recentArticles','trendingArticles','device'));
        }else{
           return abort(404); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $subcategory, $alias, $id)
    {
        $alias = str_replace(" ","-",$alias);
        $articles = Article::where('status','1')->findOrFail($id);
        $recentArticles = $this->recentArticles();
            $trendingArticles = $this->trendingArticles();
        if(Str::lower($articles->alias) == Str::lower($alias)){
            return view('frontend.content.category.singleArticle',compact('articles','recentArticles','trendingArticles'));
        }else{
            return redirect()->route('single-article',[$category, $subcategory, $articles->alias, $id]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }


    public function recentArticles(){
        $recentArticles = Article::where('status','1')->where('recent','1')->take(5)->get();
        return view('frontend.content.category.recentArticle',compact('recentArticles'));
    }

    public function trendingArticles(){
        $trendingArticles =Article::where('status','1')->where('trending','1')->take(5)->get();
        return view('frontend.content.category.trendingArticle',compact('trendingArticles'));
    }


}
