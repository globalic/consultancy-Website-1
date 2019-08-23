<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;
use App\Our_service;
use App\AbroadStudy;
use App\Youtube;
use App\WebsiteContent;
use App\Navbar;
use App\Expert_Message;

class YoutubeController extends Controller
{
    public function show($id)
    {
        $arr['website']=WebsiteContent::first();
        $arr['experts'] = Expert_Message::all();
        $arr['service']=Our_service::select('id', 'title')->get();
        $arr['abroad'] = AbroadStudy::select('id', 'title')->get();
        $arr['about'] = AboutUs::select('id', 'title')->get();
        $arr['nav_status'] = Navbar::first();
        $arr['key']= Youtube::find($id);
        return view('frontend.description_page.Youtube')->with($arr);
    }

    public function description()
    {
        $arr['website']=WebsiteContent::first();
        $arr['experts'] = Expert_Message::all();
        $arr['service']=Our_service::select('id', 'title')->get();
        $arr['abroad'] = AbroadStudy::select('id', 'title')->get();
        $arr['about'] = AboutUs::select('id', 'title')->get();
        $arr['nav_status'] = Navbar::first();
        $arr['video']= Youtube::all();
        return view('frontend.description_page.videos')->with($arr);
    }
}
