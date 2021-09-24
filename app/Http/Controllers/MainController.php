<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{

    function login(){
        return view('client.auth.login');
    }
    function register(){
        return view('client.auth.register');
    }
    function save(Request $request){
        //Validate requests
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

         //Insert data into database
         $client = new Client;
         $client->firstName = $request->firstName;
         $client->lastName = $request->lastName;
         $client->email = $request->email;
         $client->password = Hash::make($request->password);
         $save = $client->save();

         if($save){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:5|max:12'
        ]);

        $clientInfo = Client::where('email','=', $request->email)->first();

        if(!$clientInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $clientInfo->password)){
                $request->session()->put('LoggedClient', $clientInfo->id);
                return redirect('/');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedClient')){
            session()->pull('LoggedClient');
            return redirect('/');
        }
    }
}
