<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    
	use SoftDeletes;

	protected $fillable = ['name', 'display', 'url', 'parent_id', 'icon', 'status'];

	protected $dates = ['deleted_at'];	
    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
