<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'alias', 'description', 'author_id', 'status', 'image', 'content_id', 'category_id', 'status', 'recent', 'trending', 'popular', 'published'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at','updated_at'];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];   

    public function author()
    {
        return $this->belongsTo('App\AdminModel\Author','author_id');
    }

    public function content()
    {
        return $this->belongsTo('App\AdminModel\Content','content_id');
    }

    public function category()
    {
        return $this->belongsTo('App\AdminModel\Category','category_id');
    }
}
