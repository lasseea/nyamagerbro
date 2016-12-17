<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use App\Shop;

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
            'address' => 'required',
        ]);
        Shop::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'logo_img_link' => $request->logo_img_link,
            'website' => $request->website,
            'google_maps_url' => $request->google_maps_url,
        ]);
        $request->session()->flash('status', 'Butik er tilføjet!');
        return redirect()->action(
            'AdminController@newShop'
        );
    }

}
