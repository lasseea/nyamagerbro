<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.jobs');
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
