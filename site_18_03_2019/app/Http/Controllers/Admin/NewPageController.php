<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewPageController extends Controller
{
    /**
     * Create New Page
     *
     * @param  string  Page
     * @return \Illuminate\Http\Response
     */
    public function getPage($slug)
    {
    $page = Page::where('slug', $slug)->first(); // or create a helper on your model to condense this

    return view('page', compact('page'));
}
    
}
