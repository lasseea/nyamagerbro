<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use App\Shop;
use App\Shop_type;
use App\Event;
use App\Job;
use App\Rental;
use App\Shop_business_hours;
use App\Subscriber;
use DB;
use App;
use Storage;
use Mail;
use App\Mail\NewEvent;
use App\Mail\NewJob;
use App\Mail\NewRental;
use App\Event_subscribers;
use App\Job_subscribers;
use App\Rental_subscribers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function admin()
    {
        return view('admin.menu');
    }

    public function newShop()
    {
        return view('admin.addshop');
    }

    public function addShop(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:shops,name|max:255',
            'address' => 'required|max:255',
            'phone' => 'integer|digits_between:8,15',
            'description' => 'max:1000',
            'logo_img_link' => 'required|image',
            'website' => 'url|max:255',
            'google_maps_url' => 'max:1000',
            'shop_type' => 'required',
            'monday_start' => 'date_format:H:i',
            'tuesday_start' => 'date_format:H:i',
            'wednesday_start' => 'date_format:H:i',
            'thursday_start' => 'date_format:H:i',
            'friday_start' => 'date_format:H:i',
            'saturday_start' => 'date_format:H:i',
            'sunday_start' => 'date_format:H:i',
            'monday_end' => 'date_format:H:i',
            'tuesday_end' => 'date_format:H:i',
            'wednesday_end' => 'date_format:H:i',
            'thursday_end' => 'date_format:H:i',
            'friday_end' => 'date_format:H:i',
            'saturday_end' => 'date_format:H:i',
            'sunday_end' => 'date_format:H:i',
        ]);

        $file = '';
        if($request->hasFile('logo_img_link')){
            $file = $request->file('logo_img_link');
            $file->move('shop_logos', $request->name.'_'.$file->getClientOriginalName());
        }
        $shop = Shop::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'logo_img_link' => '/shop_logos/'.$request->name.'_'.$file->getClientOriginalName(),
            'website' => $request->website,
            'google_maps_url' => $request->google_maps_url,
            'shop_type_id' => $request->shop_type,
        ]);

        if($request->has('monday_start') && $request->has('monday_end')) {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 0,
                'open_time' => $request->monday_start,
                'close_time' => $request->monday_end,
                'closed' => 0,
            ]);
        } else {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 0,
                'closed' => 1,
            ]);
        }
        if($request->has('tuesday_start') && $request->has('tuesday_end')) {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 1,
                'open_time' => $request->tuesday_start,
                'close_time' => $request->tuesday_end,
                'closed' => 0,
            ]);
        } else {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 1,
                'closed' => 1,
            ]);
        }
        if($request->has('wednesday_start') && $request->has('wednesday_end')) {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 2,
                'open_time' => $request->wednesday_start,
                'close_time' => $request->wednesday_end,
                'closed' => 0,
            ]);
        } else {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 2,
                'closed' => 1,
            ]);
        }
        if($request->has('thursday_start') && $request->has('thursday_end')) {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 3,
                'open_time' => $request->thursday_start,
                'close_time' => $request->thursday_end,
                'closed' => 0,
            ]);
        } else {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 3,
                'closed' => 1,
            ]);
        }
        if($request->has('friday_start') && $request->has('friday_end')) {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 4,
                'open_time' => $request->friday_start,
                'close_time' => $request->friday_end,
                'closed' => 0,
            ]);
        } else {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 4,
                'closed' => 1,
            ]);
        }
        if($request->has('saturday_start') && $request->has('saturday_end')) {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 5,
                'open_time' => $request->saturday_start,
                'close_time' => $request->saturday_end,
                'closed' => 0,
            ]);
        } else {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 5,
                'closed' => 1,
            ]);
        }
        if($request->has('sunday_start') && $request->has('sunday_end')) {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 6,
                'open_time' => $request->sunday_start,
                'close_time' => $request->sunday_end,
                'closed' => 0,
            ]);
        } else {
            Shop_business_hours::create([
                'shop_id' => $shop->id,
                'day_of_week' => 6,
                'closed' => 1,
            ]);
        }

        $request->session()->flash('status', 'Butik er tilføjet!');
        return redirect()->action(
            'AdminController@newShop'
        );
    }

    public function shops()
    {
        $shops = App\Shop::join('shop_types', 'shops.shop_type_id', '=', 'shop_types.id')
            ->select('shops.*', 'shop_types.shop_type')
            ->paginate(10);
        return view('admin.shops', ['shops' =>  $shops]);
    }

    public function editFormShop($id)
    {
        $shops = App\Shop::where('shops.id', $id)
            ->get();
        $businesshours = App\Shop_business_hours::where('shop_id', $id)->get();
        return view('admin.updateshop', ['shops' => $shops, 'businesshours' => $businesshours]);
    }

    public function editShop($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'integer|digits_between:8,15',
            'description' => 'max:1000',
            'logo_img_link' => 'image',
            'website' => 'url|max:255',
            'google_maps_url' => 'max:1000',
            'shop_type' => 'required',
            'monday_start' => 'date_format:H:i',
            'tuesday_start' => 'date_format:H:i',
            'wednesday_start' => 'date_format:H:i',
            'thursday_start' => 'date_format:H:i',
            'friday_start' => 'date_format:H:i',
            'saturday_start' => 'date_format:H:i',
            'sunday_start' => 'date_format:H:i',
            'monday_end' => 'date_format:H:i',
            'tuesday_end' => 'date_format:H:i',
            'wednesday_end' => 'date_format:H:i',
            'thursday_end' => 'date_format:H:i',
            'friday_end' => 'date_format:H:i',
            'saturday_end' => 'date_format:H:i',
            'sunday_end' => 'date_format:H:i',
        ]);
        $shop = App\Shop::where('id', $id)->first();
        $old_image_path = $shop->logo_img_link;
        if($request->hasFile('logo_img_link')) {
            If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path);
            }
            $shop_save = App\Shop::find($id);
            $shop_image = $request->file('logo_img_link');
            $shop_image->move('shop_logos', $request->name . '_' . $shop_image->getClientOriginalName());
            $shop_save->logo_img_link = '/shop_logos/'.$request->name . '_' . $shop_image->getClientOriginalName();
            $shop_save->save();
        } else {
            if ($request->remove_logo == true) {
                If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path);
                }
            }
        }
        App\Shop::where('id', $id)
            ->update(
                ['name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'description' => $request->description,
                    'website' => $request->website,
                    'google_maps_url' => $request->google_maps_url,
                    'shop_type_id' => $request->shop_type,
                ]);
        if($request->has('monday_start') && $request->has('monday_end')) {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 0],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 0,
                        'open_time' => $request->monday_start,
                        'close_time' => $request->monday_end,
                        'closed' => 0,
                    ]
            );
        } else {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 0],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 0,
                        'open_time' => null,
                        'close_time' => null,
                        'closed' => 1,
                    ]
                );
        }
        if($request->has('tuesday_start') && $request->has('tuesday_end')) {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 1],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 1,
                        'open_time' => $request->tuesday_start,
                        'close_time' => $request->tuesday_end,
                        'closed' => 0,
                    ]
                );
        } else {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 1],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 1,
                        'open_time' => null,
                        'close_time' => null,
                        'closed' => 1,
                    ]
                );
        }
        if($request->has('wednesday_start') && $request->has('wednesday_end')) {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 2],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 2,
                        'open_time' => $request->wednesday_start,
                        'close_time' => $request->wednesday_end,
                        'closed' => 0,
                    ]
                );
        } else {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 2],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 2,
                        'open_time' => null,
                        'close_time' => null,
                        'closed' => 1,
                    ]
                );
        }
        if($request->has('thursday_start') && $request->has('thursday_end')) {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 3],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 3,
                        'open_time' => $request->thursday_start,
                        'close_time' => $request->thursday_end,
                        'closed' => 0,
                    ]
                );
        } else {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 3],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 3,
                        'open_time' => null,
                        'close_time' => null,
                        'closed' => 1,
                    ]
                );
        }
        if($request->has('friday_start') && $request->has('friday_end')) {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 4],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 4,
                        'open_time' => $request->friday_start,
                        'close_time' => $request->friday_end,
                        'closed' => 0,
                    ]
                );
        } else {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 4],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 4,
                        'open_time' => null,
                        'close_time' => null,
                        'closed' => 1,
                    ]
                );
        }
        if($request->has('saturday_start') && $request->has('saturday_end')) {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 5],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 5,
                        'open_time' => $request->saturday_start,
                        'close_time' => $request->saturday_end,
                        'closed' => 0,
                    ]
                );
        } else {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 5],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 5,
                        'open_time' => null,
                        'close_time' => null,
                        'closed' => 1,
                    ]
                );
        }
        if($request->has('sunday_start') && $request->has('sunday_end')) {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 6],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 6,
                        'open_time' => $request->sunday_start,
                        'close_time' => $request->sunday_end,
                        'closed' => 0,
                    ]
                );
        } else {
            App\Shop_business_hours::where([
                ['shop_id', $id],
                ['day_of_week', '=', 6],
            ])
                ->update(
                    [
                        'shop_id' => $shop->id,
                        'day_of_week' => 6,
                        'open_time' => null,
                        'close_time' => null,
                        'closed' => 1,
                    ]
                );
        }
        $request->session()->flash('status', 'Butik er rettet!');
        return redirect()->action(
            'AdminController@editFormShop', ['shop' => $id]
        );
    }

    public function deleteShop($id, Request $request)
    {
        $shop = App\Shop::where('id', $id)->first();
        $old_image_path = $shop->logo_img_link;
        If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path);
        }
        Shop::destroy($id);
        $request->session()->flash('status', 'Butik er slettet!');
        return redirect()->action(
            'AdminController@shops'
        );
    }

    public function newJob()
    {
        return view('admin.addjob');
    }
    public function addJob(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'brief_description' => 'max:500',
            'full_description' => 'required|max:3000',
            'shop_name' => 'required|max:255|exists:shops,name',
        ]);
        $shop = App\Shop::where('name', $request->shop_name)->first();

        Job::create([
            'title' => $request->title,
            'brief_description' => $request->brief_description,
            'full_description' => $request->full_description,
            'shop_id' => $shop->id,
        ]);
        //send mail too all job subscribers
        $job_subscribers = App\Job_subscribers::join('users', 'users.id', '=', 'job_subscribers.user_id')
            ->select('users.email')
            ->get();
        foreach ($job_subscribers as $job_subscriber) {
            Mail::to($job_subscriber->email)->send(new NewJob());
        }

        $request->session()->flash('status', 'Jobopslag er tilføjet!');
        return redirect()->action(
            'AdminController@newJob'
        );
    }

    public function jobs()
    {
        $jobs = App\Job::join('shops', 'jobs.shop_id', '=', 'shops.id')
            ->select('jobs.*', 'shops.name')
            ->paginate(10);
        return view('admin.jobs', ['jobs' =>  $jobs]);
    }

    public function editFormJob($id)
    {
        $jobs = App\Job::where('jobs.id', $id)
            ->join('shops', 'jobs.shop_id', '=', 'shops.id')
            ->select('jobs.*', 'shops.name')
            ->get();
        return view('admin.updatejob', ['jobs' => $jobs]);
    }

    public function editJob($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'brief_description' => 'max:500',
            'full_description' => 'required|max:3000',
            'shop_name' => 'required|max:255|exists:shops,name',
        ]);
        $shop = App\Shop::where('name', $request->shop_name)->first();

        App\Job::where('id', $id)
            ->update(
                ['title' => $request->title,
                'brief_description' => $request->brief_description,
                'full_description' => $request->full_description,
                'shop_id' => $shop->id
            ]);
        $request->session()->flash('status', 'Jobopslag er rettet!');
        return redirect()->action(
          'AdminController@editFormJob', ['job' => $id]
        );
    }

    public function deleteJob($id, Request $request)
    {
        Job::destroy($id);
        $request->session()->flash('status', 'Jobopslag er slettet!');
        return redirect()->action(
            'AdminController@jobs'
        );
    }

    public function newRental()
    {
        return view('admin.addrental');
    }
    public function addRental(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'address' => 'required|max:255',
            'brief_description' => 'max:500',
            'full_description' => 'required|max:3000',
            'room_img_link' => 'required|image',
        ]);
        $room_image = '';
        if($request->hasFile('room_img_link')){
            $room_image = $request->file('room_img_link');
            $room_image->move('rental_images', $request->title.'_'.$room_image->getClientOriginalName());
        }
        Rental::create([
            'title' => $request->title,
            'address' => $request->address,
            'brief_description' => $request->brief_description,
            'full_description' => $request->full_description,
            'room_img_link' => '/rental_images/'.$request->title.'_'.$room_image->getClientOriginalName(),
        ]);
        //send mail too all rental subscribers
        $rental_subscribers = App\Rental_subscribers::join('users', 'users.id', '=', 'rental_subscribers.user_id')
            ->select('users.email')
            ->get();
        foreach ($rental_subscribers as $rental_subscriber) {
            Mail::to($rental_subscriber->email)->send(new NewRental());
        }
        $request->session()->flash('status', 'Lokale til udleje er tilføjet!');
        return redirect()->action(
            'AdminController@newRental'
        );
    }

    public function rentals()
    {
        $rentals = App\Rental::paginate(10);

        return view('admin.rentals', ['rentals' =>  $rentals]);
    }

    public function editFormRental($id)
    {
        $rentals = App\Rental::where('id', $id)->get();
        return view('admin.updaterental', ['rentals' => $rentals]);
    }

    public function editRental($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'address' => 'required|max:255',
            'brief_description' => 'max:500',
            'full_description' => 'required|max:3000',
            'room_img_link' => 'image',
        ]);
        $rental = App\Rental::where('id', $id)->first();
        $old_image_path = $rental->room_img_link;
        if($request->hasFile('room_img_link')){
            If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path);
            }
            $room_image = $request->file('room_img_link');
            $room_image->move('rental_images', $request->title.'_'.$room_image->getClientOriginalName());
            App\Rental::where('id', $id)
                ->update(
                    ['title' => $request->title,
                        'address' => $request->address,
                        'brief_description' => $request->brief_description,
                        'full_description' => $request->full_description,
                        'room_img_link' => '/rental_images/'.$request->title.'_'.$room_image->getClientOriginalName(),
                    ]);
        } else {
            if ($request->remove_image == true) {
                If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path);
                }
            }
            App\Rental::where('id', $id)
                ->update(
                    ['title' => $request->title,
                        'address' => $request->address,
                        'brief_description' => $request->brief_description,
                        'full_description' => $request->full_description,
                    ]);

        }
        $request->session()->flash('status', 'Lokale til udleje er rettet!');
        return redirect()->action(
            'AdminController@editFormRental', ['rental' => $id]
        );
    }

    public function deleteRental($id, Request $request)
    {
        $rental = App\Rental::where('id', $id)->first();
        $old_image_path = $rental->room_img_link;
        If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path);
        }
        Rental::destroy($id);
        $request->session()->flash('status', 'Lokale til udleje er slettet!');
        return redirect()->action(
            'AdminController@rentals'
        );
    }

    public function newEvent()
    {
        return view('admin.addevent');
    }
    public function addEvent(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required|date',
            'brief_description' => 'max:500',
            'full_description' => 'required|max:3000',
            'event_img_link' => 'required|image',
            'small_img_link' => 'required|image',
        ]);
        $event_image = '';
        if($request->hasFile('event_img_link')){
            $event_image = $request->file('event_img_link');
            $event_image->move('event_images', $request->title.'_'.$event_image->getClientOriginalName());
        }
        $small_image = '';
        if($request->hasFile('small_img_link')){
            $small_image = $request->file('small_img_link');
            $small_image->move('event_small_images', $request->title.'_'.$small_image->getClientOriginalName());
        }
        Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'brief_description' => $request->brief_description,
            'full_description' => $request->full_description,
            'event_img_link' => '/event_images/'.$request->title.'_'.$event_image->getClientOriginalName(),
            'small_img_link' => '/event_small_images/'.$request->title.'_'.$small_image->getClientOriginalName(),
        ]);

        //send mail too all event subscribers
        $event_subscribers = App\Event_subscribers::join('users', 'users.id', '=', 'event_subscribers.user_id')
            ->select('users.email')
            ->get();
        foreach ($event_subscribers as $event_subscriber) {
            Mail::to($event_subscriber->email)->send(new NewEvent());
        }

        $request->session()->flash('status', 'Event er tilføjet!');
        return redirect()->action(
            'AdminController@newEvent'
        );
    }

    public function events()
    {
        $events = App\Event::paginate(10);

        return view('admin.events', ['events' =>  $events]);
    }

    public function editFormEvent($id)
    {
        $events = App\Event::where('id', $id)->get();
        return view('admin.updateevent', ['events' => $events]);
    }

    public function editEvent($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required|date',
            'brief_description' => 'max:500',
            'full_description' => 'required|max:3000',
            'event_img_link' => 'image',
            'small_img_link' => 'image',
        ]);
        $event = App\Event::where('id', $id)->first();
        $old_image_path_event = $event->event_img_link;
        $old_image_path_small = $event->small_img_link;
        if($request->hasFile('event_img_link') && $request->hasFile('small_img_link')){
            If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path_event)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path_event);
            }
            If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path_small)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path_small);
            }
            $event_image = $request->file('event_img_link');
            $small_image = $request->file('small_img_link');
            $event_image->move('event_images', $request->title.'_'.$event_image->getClientOriginalName());
            $small_image->move('event_small_images', $request->title.'_'.$small_image->getClientOriginalName());
            App\Event::where('id', $id)
                ->update(
                    ['title' => $request->title,
                        'date' => $request->date,
                        'brief_description' => $request->brief_description,
                        'full_description' => $request->full_description,
                        'event_img_link' => '/event_images/'.$request->title.'_'.$event_image->getClientOriginalName(),
                        'small_img_link' => '/event_small_images/'.$request->title.'_'.$small_image->getClientOriginalName(),
                    ]);
        } else if ($request->hasFile('event_img_link')) {
            If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path_event)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path_event);
            }
            if ($request->remove_image2 == true) {
                If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path_small)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path_small);
                }
            }
            $event_image = $request->file('event_img_link');
            $event_image->move('event_images', $request->title.'_'.$event_image->getClientOriginalName());
            App\Event::where('id', $id)
                ->update(
                    ['title' => $request->title,
                        'date' => $request->date,
                        'brief_description' => $request->brief_description,
                        'full_description' => $request->full_description,
                        'event_img_link' => '/event_images/'.$request->title.'_'.$event_image->getClientOriginalName(),
                    ]);
        } else if ($request->hasFile('small_img_link')) {
            If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path_small)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path_small);
            }
            if ($request->remove_image1 == true) {
                If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path_event)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path_event);
                }
            }
            $small_image = $request->file('small_img_link');
            $small_image->move('event_small_images', $request->title.'_'.$small_image->getClientOriginalName());
            App\Event::where('id', $id)
                ->update(
                    ['title' => $request->title,
                        'date' => $request->date,
                        'brief_description' => $request->brief_description,
                        'full_description' => $request->full_description,
                        'small_img_link' => '/event_small_images/'.$request->title.'_'.$small_image->getClientOriginalName(),
                    ]);
        } else {
                if ($request->remove_image1 == true) {
                    If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path_event)) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path_event);
                    }
                }
                if ($request->remove_image2 == true) {
                    If (file_exists($_SERVER['DOCUMENT_ROOT'] . $old_image_path_small)) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path_small);
                    }
                }
                App\Event::where('id', $id)
                    ->update(
                        ['title' => $request->title,
                            'date' => $request->date,
                            'brief_description' => $request->brief_description,
                            'full_description' => $request->full_description,
                        ]);
        }
        $request->session()->flash('status', 'Event/Nyhed er rettet!');
        return redirect()->action(
            'AdminController@editFormEvent', ['event' => $id]
        );

    }

    public function deleteEvent($id, Request $request)
    {
        $event = App\Event::where('id', $id)->first();
        $event_image_path = $event->event_img_link;
        $small_image_path = $event->small_img_link;
        If (file_exists($_SERVER['DOCUMENT_ROOT'] . $event_image_path)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $event_image_path);
        }
        If (file_exists($_SERVER['DOCUMENT_ROOT'] . $small_image_path)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $small_image_path);
        }
        Event::destroy($id);
        $request->session()->flash('status', 'Event er slettet!');
        return redirect()->action(
            'AdminController@events'
        );
    }
}
