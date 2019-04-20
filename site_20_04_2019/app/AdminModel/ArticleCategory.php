<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content_type_name' ,'status'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at','updated_at'];
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'content_types';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
