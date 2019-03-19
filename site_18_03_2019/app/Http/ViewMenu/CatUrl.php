<?php
namespace App\Http\ViewMenu;

use Illuminate\View\View;
use Auth;
use App\User;
use App\AdminModel\Module;
use Illuminate\Http\Request;

class CatUrl 
{
  public function compose(View $view){
    $path = url()->current();
    // $path = explode('/', $path);
    // if(count($path) == 4)
    // $path = $test[count($test)-1];
    $view->with('path', $path);    
  }

}