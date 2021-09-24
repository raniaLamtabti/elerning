<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Course;
use App\models\User;
use App\models\Client;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $coursesCount = Course::count();
        $clientsCount = Client::count();
        $staffsCount = User::where('is_admin', 0)->count();
        $adminsCount = User::where('is_admin', 1)->count();
        $admin = 0;
        if(Auth::User()->is_admin){
            $admin = 1;
            $courses = Course::where('status', 'attendre')->get();
        }else{
            $user = auth()->user()->id;
            $courses = Course::where('users_id', $user)->where('status', 'attendre')->get();
        }
        return view('user.home', compact('courses','coursesCount','clientsCount','staffsCount','adminsCount','admin'));
    }
}
