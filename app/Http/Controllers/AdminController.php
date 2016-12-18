<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use App\Shop;
use App\Shop_type;

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
            'name' => 'required|unique:shops|max:255',
            'address' => 'required|max:255',
            'phone' => 'integer',
            'description' => 'max:1000',
            'logo_img_link' => 'max:500',
            'website' => 'url|max:255',
            'google_maps_url' => 'max:1000',
            'shop_type' => 'required',
        ]);
        $file = '';
        if($request->hasFile('logo_img_link')){
            $file = $request->file('logo_img_link');
            $file->move('uploads', $request->name.'_'.$file->getClientOriginalName());
        }
        Shop::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'logo_img_link' => '/uploads/'.$request->name.'_'.$file->getClientOriginalName(),
            'website' => $request->website,
            'google_maps_url' => $request->google_maps_url,
        ]);
        $shop = (new shop)->create($request->all());
        Shop_type::create([
            'shop_type' => $request->shop_type,
            'shop_id' => $shop->id,
        ]);

        $request->session()->flash('status', 'Butik er tilføjet!');
        return redirect()->action(
            'AdminController@newShop'
        );
    }

    public function shops()
    {
        return view('admin.shops');
    }

    public function editShop()
    {

    }

    public function deleteShop()
    {

    }

    public function newJob()
    {
        return view('admin.addjob');
    }
    public function addJob()
    {

    }

    public function jobs()
    {
        return view('admin.jobs');
    }

    public function editJob()
    {

    }

    public function deleteJob()
    {

    }

    public function newRental()
    {
        return view('admin.addrental');
    }
    public function addRental()
    {

    }

    public function rentals()
    {
        return view('admin.rentals');
    }

    public function editRental()
    {

    }

    public function deleteRental()
    {

    }

    public function newEvent()
    {
        return view('admin.addevent');
    }
    public function addEvent()
    {

    }

    public function events()
    {
        return view('admin.events');
    }

    public function editEvent()
    {

    }

    public function deleteEvent()
    {

    }
}
