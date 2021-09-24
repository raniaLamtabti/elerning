<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\User;
use Auth;
use Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $admin = 0;
        if(Auth::User()->is_admin){
            $admin = 1;
        }
        return view('user.courses', compact('courses','admin'));
    }

    public function indexByUser()
    {
        $id = Auth::User()->id;
        $courses = Course::where('users_id', $id)->get();
        return view('user.myCourses', ['courses'=> $courses]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexWelcome()
    {
        $courses = Course::orderBy('id', 'desc')->take(3)->get();

        return view('welcome', ['courses'=> $courses]);
    }

    public function indexClient()
    {
        $courses = Course::all();
        return view('client.coursesClient', ['courses'=> $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.courseAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Auth::User()->firstName.''.Auth::User()->lastName;
        $course = new Course();
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->hours = $request->input('hours');
        $course->users_id = Auth::User()->id;

        if ($request->hasFile('videoIntroPath')) {
            $fileName = $request->file('videoIntroPath')->getClientOriginalName();
            $request->videoIntroPath->move('course/'.$name.'/', $fileName);
            $course->videoIntroPath = 'course/'.$name.'/'. $fileName;
        }
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->image->move('course/'.$name.'/', $fileName);
            $course->image = 'course/'.$name.'/'. $fileName;
        }

        $course->save();
        $id = $course->id;

        return Redirect::to('/show/'. $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $levels = Level::where('courses_id', $id)->get();
        $admin = 0;
        $id = Auth::User()->id;
        if(Auth::User()->is_admin){
            $admin = 1;
        }

        return view('user.course', compact('course','levels','admin','id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showClient($id)
    {
        $course = Course::find($id);
        $levels = Level::where('courses_id', $id)->get();
        $user = user::find($course->users_id);

        return view('client.courseShow', compact('course','levels','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id)
    {
        $course = Course::find($id);

        $course->status = 'accepte';

        $course->save();

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        $course->delete();

        return redirect('home');
    }
}
