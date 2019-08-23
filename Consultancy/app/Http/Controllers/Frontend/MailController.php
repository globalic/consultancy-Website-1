<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail;
use App\AboutUs;
use App\Our_service;
use App\AbroadStudy;
use App\WebsiteContent;
use App\Navbar;
use App\Expert_Message;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['website']=WebsiteContent::first();
        $arr['experts'] = Expert_Message::all();

        $arr['service']=Our_service::select('id', 'title')->get();
        $arr['abroad'] = AbroadStudy::select('id', 'title')->get();
        $arr['nav_status'] = Navbar::first();
        $arr['about'] = AboutUs::select('id', 'title')->get();
        return view('frontend.contacts')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Mail $Mail)
    {
        $Mail=new Mail;
        $Mail->name = $request->name;
        $Mail->email = $request->email;
        $Mail->phone = $request->phone;
        $Mail->subject = $request->subject;
        $Mail->description = $request->description;
        if ($Mail->save()) {
            return back()->with('success', 'Mail Sent Successfully');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
