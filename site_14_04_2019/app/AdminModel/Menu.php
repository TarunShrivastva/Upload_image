<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

	protected $fillable = ['name', 'display', 'url', 'parent_id', 'category_id', 'icon', 'status'];

	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at','updated_at'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];	

    public function children() {
        return $this->hasMany('App\AdminModel\Menu','id');
    }
    
    public function parent() {
        return $this->belongsTo('App\AdminModel\Menu','parent_id');
    }
}