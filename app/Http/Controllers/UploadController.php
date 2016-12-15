<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UploadController extends Controller
{
    public function pictures()
    {
        return view('admin.pictures');
    }

    public function uploadPicture(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file->move('uploads', $file->getClientOriginalName());
            $request->session()->flash('status', 'Billedet er uploadet!');
            return redirect()->action(
              'UploadController@pictures'
            );
        }
    }
}
