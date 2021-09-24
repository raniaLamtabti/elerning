<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Course;
use App\Models\User;
use Auth;
use Redirect;

class LessonController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.lessonsAdd');
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
        $course = Course::find($request->input('courses_id'));
        $courseName = $course->name;
        $lesson = new Lesson();
        $lesson->name = $request->input('name');
        $lesson->levels_id = $request->input('levels_id');

        if ($request->hasFile('videoPath')) {
            $fileName = $request->file('videoPath')->getClientOriginalName();
            $request->videoPath->move('course/'.$name.'/'. $fileName);
            $lesson->videoPath = 'course/'.$name.'/'. $fileName;
        }

        $lesson->save();

        $id = $request->input('courses_id');
        echo $id;
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
        $lesson = Lesson::find($id);
        $level = Level::find($lesson->levels_id);
        $course = Course::find($level->courses_id);
        $levels = Level::where('courses_id', $course->id)->get();
        $user = user::find($course->users_id);

        return view('client.lesson', compact('course','levels','lesson','user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $levelId = $lesson->levels_id;
        $level = Level::find($levelId);
        $courseId = $level->courses_id;

        $lesson->delete();

        return Redirect::to('/show/'. $courseId);
    }
}
