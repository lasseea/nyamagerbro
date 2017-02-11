<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App;
use DB;

class PagesController extends Controller
{

    public function shops($shop_type = null)
    {
        $selectedtype = App\Models\Shop_type::where('shop_types.id', $shop_type)->first();
        $shoptypes = App\Models\Shop_type::all();
        if (!$shop_type) {
            $shops = App\Models\Shop::join('shop_types', 'shops.shop_type_id', '=', 'shop_types.id')
                ->select('shops.*', 'shop_types.shop_type')
                ->paginate(10);
            return view('pages.shops', compact('shops', 'shoptypes', 'selectedtype'));
        } else {
            $shops = App\Models\Shop::join('shop_types', 'shops.shop_type_id', '=', 'shop_types.id')
                ->where('shops.shop_type_id', '=', $shop_type)
                ->select('shops.*', 'shop_types.shop_type')
                ->paginate(10);
            return view('pages.shops', compact('shops', 'shoptypes', 'selectedtype'));
        }
    }

    public function shop($id)
    {
        $shops = App\Models\Shop::where('shops.id', $id)
            ->join('shop_types', 'shops.shop_type_id', '=', 'shop_types.id')
            ->select('shops.*', 'shop_types.shop_type')
            ->get();
        $businesshours = App\Models\Shop_business_hours::where('shop_id', $id)->get();
        return view('pages.seeshop', ['shops' => $shops, 'businesshours' => $businesshours]);
    }

    public function events()
    {
        $events = App\Models\Event::orderBy('date', 'desc')
            ->paginate(10);

        return view('pages.events', ['events' =>  $events]);
    }

    public function event($id)
    {
        $events = App\Models\Event::where('id', $id)->get();
        return view('pages.seeevent', ['events' => $events]);
    }

    public function culture()
    {
        return view('pages.culture');
    }

    public function jobs()
    {
        $jobs = App\Models\Job::join('shops', 'jobs.shop_id', '=', 'shops.id')
            ->select('jobs.*', 'shops.name')
            ->paginate(10);
        return view('pages.jobs', ['jobs' =>  $jobs]);
    }

    public function job($id)
    {
        $jobs = App\Models\Job::where('jobs.id', $id)
            ->join('shops', 'jobs.shop_id', '=', 'shops.id')
            ->select('jobs.*', 'shops.name', 'shops.id as shop_id', 'shops.logo_img_link', 'shops.address')
            ->get();
        return view('pages.seejob', ['jobs' => $jobs]);
    }

    public function rentals()
    {
        $rentals = App\Models\Rental::paginate(10);

        return view('pages.rentals', ['rentals' =>  $rentals]);
    }

    public function rental($id)
    {
        $rentals = App\Models\Rental::where('id', $id)->get();
        return view('pages.seerental', ['rentals' => $rentals]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function overview()
    {
        return view('pages.overview');
    }

    public function parking()
    {
        return view('pages.parking');
    }

    public function terms()
    {
        return view('pages.terms');
    }
}
