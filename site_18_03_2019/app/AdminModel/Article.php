<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title' ,'description', 'author', 'status', 'image', 'content_type', 'status', 'recent', 'trending', 'most_popular', 'published'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at','updated_at'];
    
}
