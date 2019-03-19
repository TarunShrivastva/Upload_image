<?php
namespace App\Helpers\Admin;
 
use Illuminate\Support\Facades\DB;

class GetCatUrl {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function getCatUrl($path) {
		
		return $path;        
    }
}