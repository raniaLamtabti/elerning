<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.users', ['users'=> $users]);
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->description = $request->input('description');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->dateBirth = $request->input('dateBirth');
        $user->is_admin = $request->input('role');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.profile', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $time = Carbon::today()->toDateString();

        $user = User::find($id);

        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->description = $request->input('description');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->dateBirth = $request->input('dateBirth');
        $user->password = Hash::make($request->input('password'));
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            echo $fileName;
            $fileName = $time.'_'.$id.'_'.$fileName;
            echo $fileName;
            $request->image->move('profile', $fileName);
            $user->image = 'profile/' . $fileName;
        }

        $user->save();

        return Redirect::to('/profile/'. $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request, $id)
    {
        $user = User::find($id);

        $user->is_admin = $request->input('role');

        $user->save();

        return redirect('users');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('home');
    }

}
