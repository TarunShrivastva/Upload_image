<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    
	use SoftDeletes;

	protected $fillable = ['name', 'display', 'url', 'parent_id', 'icon', 'status'];

	protected $dates = ['deleted_at'];	
   
   public function children() {
        return $this->hasMany('App\AdminModel\Module','id');
   }
    
   public function parent() {
        return $this->belongsTo('App\AdminModel\Module','parent_id');
   }     
}
