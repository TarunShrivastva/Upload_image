<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class UsersModules extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_modules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','module_id' ,'can_add','can_edit','can_delete'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
