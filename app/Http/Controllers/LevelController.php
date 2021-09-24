<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Course;
use Auth;
use Redirect;

class LevelController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = new Level();
        $level->name = $request->input('level');
        $level->courses_id = $request->input('courses_id');
        $level->save();

        $id = $request->input('courses_id');


        return Redirect::to('/show/'. $id);
    }

}
