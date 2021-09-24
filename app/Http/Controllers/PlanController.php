<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Plan;

use Carbon\Carbon;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedClientInfo'=>Client::where('id','=', session('LoggedClient'))->first()];
        return view('client.pricing', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->input('type');
        $plan = new Plan();
        $plan->clients_id = $request->input('clients_id');
        $plan->type = $type;
        if($type == "monthly"){
            $plan->finale_date = Carbon::now()->addMonth();
        }elseif($type == "annual"){
            $plan->finale_date = Carbon::now()->addYears();
        }
        $plan->save();

        return redirect('/');
    }
}
