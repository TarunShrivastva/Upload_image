<?php
namespace App\Http\FrontMenu;

use Illuminate\View\View;
use App\AdminModel\Menu;

class FrontMenu 
{
  public function compose(View $view){
    $menus = Menu::where('status','1')->where('parent_id',0)->get();
      if($menus){
        foreach($menus as $key => $value){
          $value->child_module =  $this->get_child_module($value['id']);
          // if($value->child_module){
          //   foreach($value->child_module as $key => $value1){
          //     $id = $this->get_child_module($value1['id']);
          //     $value->child_module[$key] = $child_module;
          //   }
          // }
        }
      }
      $menus = $menus->toArray();
    $view->with('menus', $menus);    
  }

  /**
   * Function to the child module of parent module
   *
   *@param int $module_id
   *
   *@access public
   *
   *@return array $child_module
   *
   *
   **/
    public function get_child_module($menu_id){
      $child_module = Menu::where('parent_id',$menu_id)->where('status','1')->get()->toArray();
      return $child_module;
    }
}