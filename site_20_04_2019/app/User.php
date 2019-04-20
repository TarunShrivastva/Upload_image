<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email' ,"password","profile_image","address" ,"contact_number","latitude","longitude","user_type","status"];

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
    protected $table = 'users';



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
   
    /**
     * Get the phone record associated with the user.
     */
    public function module()
    {
        return $this->belongsToMany('App\AdminModel\Module', 'module_user')->where('parent_id',0)->withPivot('can_add','can_edit','can_delete')->withTimestamps();
    }
}
