<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Event_subscribers;
use App\Job_subscribers;
use App\Rental_subscribers;
use DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function subscribe($subscription, Request $request)
    {
        if ($subscription == "job"){
            $this->validate($request, [
                'user_id' => 'required|unique:job_subscribers',
            ]);
            Job_subscribers::create([
                'user_id' => $request->user_id,
            ]);
            $request->session()->flash('status', 'Du er nu tilmeldt nyheder om jobs');
        } else if ($subscription == "lokale"){
            $this->validate($request, [
                'user_id' => 'required|unique:rental_subscribers',
            ]);
            Rental_subscribers::create([
                'user_id' => $request->user_id,
            ]);
            $request->session()->flash('status', 'Du er nu tilmeldt nyheder om lokaler');
        } else if ($subscription == "event"){
            $this->validate($request, [
                'user_id' => 'required|unique:event_subscribers',
            ]);
            Event_subscribers::create([
                'user_id' => $request->user_id,
            ]);
            $request->session()->flash('status', 'Du er nu tilmeldt events og nyheder');
        }
        return redirect()->action(
            'UsersController@profile'
        );
    }

    public function unsubscribe($subscription, Request $request)
    {
        $user_id = $request->user_id;
        if ($subscription == "job"){
            DB::table('job_subscribers')->where('user_id', '=', $user_id)->delete();
            $request->session()->flash('status', 'Du er nu afmeldt nyheder om jobs');
        } else if ($subscription == "lokale"){
            DB::table('rental_subscribers')->where('user_id', '=', $user_id)->delete();
            $request->session()->flash('status', 'Du er nu afmeldt nyheder om lokaler');
        } else if ($subscription == "event"){
            DB::table('event_subscribers')->where('user_id', '=', $user_id)->delete();
            $request->session()->flash('status', 'Du er nu afmeldt events og nyheder');
        }
        return redirect()->action(
            'UsersController@profile'
        );
    }
}
