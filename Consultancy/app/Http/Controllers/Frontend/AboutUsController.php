<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;
use App\Navbar;
use App\Our_service;
use App\AbroadStudy;
use App\WebsiteContent;
use App\Expert_Message;

class AboutUsController extends Controller
{
    public function show($id)
    {
        $arr['website']=WebsiteContent::first();
        $arr['service']=Our_service::select('id', 'title')->get();
        $arr['abroad'] = AbroadStudy::select('id', 'title')->get();
        $arr['about'] = AboutUs::select('id', 'title')->get();
        $arr['experts'] = Expert_Message::all();

        $arr['nav_status'] = Navbar::first();
        $arr['about_post']= AboutUs::find($id);
        return view('frontend.description_page.about')->with($arr);
    }
}
