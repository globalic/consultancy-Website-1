<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client_review;
use App\WebsiteContent;
use App\Mail;
use App\Navbar;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
     $arr['reviews'] = Client_review::where("status" ,"=" ,"0")->get();
     $arr['mails'] = Mail::where("view_count" ,"=" ,"0")->get();
     $arr['website']=WebsiteContent::first();
     return view('backend.dashboard')->with($arr);
    }

}
