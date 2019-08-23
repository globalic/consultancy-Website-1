<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slider;
use App\AboutUs;
use App\Our_service;
use App\NewsUpdate;
use App\Youtube;
use App\Client_review;
use App\AbroadStudy;
use App\WebsiteContent;
use App\Navbar;
use App\OurExperts;
use App\Abroad_study_status;
use App\Expert_Message;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Gallery;
use App\Partner;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function index()
    {
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'manage website']);
        $arr['news'] = NewsUpdate::orderBy('created_at', 'desc')->take(2)->get();
        $arr['website']=WebsiteContent::first();
        $arr['check_news'] = NewsUpdate::first();
        $arr['service']=Our_service::all();
        $arr['sliders']=slider::all();
        $arr['about']=AboutUs::all();
        $arr['youtube'] = Youtube::first();
        $arr['nav_status'] = Navbar::first();
        $arr['partners'] = Partner::all();
        $arr['experts'] = Expert_Message::where("status", "=", "1")->get();
        $arr['expert'] = OurExperts::all();
        $arr['gallery'] = Gallery::all();
        $arr['review'] = Client_review::where("status", "=", "1")->get();
        $arr['abroad'] = AbroadStudy::select('id', 'title')->get();
        $arr['abroad_study_status']= Abroad_Study_Status::first();
        return view('frontend.welcome')->with($arr);
    }
}
