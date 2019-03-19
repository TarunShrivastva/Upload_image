<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1);
        // $user->roles()->attach(1, ['name' => 'Test Name']);
        foreach ($user->roles as $role) {
            echo $role->name; echo ", " . $role->pivot->created_at;
            echo "<br>";
        }
            echo "<br>";
        
        $role = Role::find(1);
        foreach ($role->users as $user) {
            echo $user->created_at;
            echo "<br>";
        }
                
        
        return view('home');
    }
}
