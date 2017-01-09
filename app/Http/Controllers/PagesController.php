<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jobs;
use App;

class PagesController extends Controller
{

    public function shops() {
        return view('pages.shops');
    }

    public function events() {
        return view('pages.events');
    }

    public function culture() {
        return view('pages.culture');
    }

    public function jobs() {
        $jobs = App\Job::join('shops', 'jobs.shop_id', '=', 'shops.id')
            ->select('jobs.*', 'shops.name')
            ->paginate(10);
        return view('pages.jobs', ['jobs' =>  $jobs]);
    }

    public function job($id) {
        $jobs = App\Job::where('jobs.id', $id)
            ->join('shops', 'jobs.shop_id', '=', 'shops.id')
            ->select('jobs.*', 'shops.name')
            ->get();
        return view('pages.seejob', ['jobs' => $jobs]);
    }

    public function rentals() {
        return view('pages.rentals');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function overview() {
        return view('pages.overview');
    }

    public function parking() {
        return view('pages.parking');
    }

    public function terms() {
        return view('pages.terms');
    }
}
