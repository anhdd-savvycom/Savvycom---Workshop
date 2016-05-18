<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function ckeditorUpload(Request $request) {
        $file = $request->file('upload');
        $name = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
        $path = '/images/ckeditor_upload';

        $file->move(public_path($path), $name);

        $funcNum = $request->get('CKEditorFuncNum');
        $url = url($path . '/' . $name);
        $message = null;

        return "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }
}
