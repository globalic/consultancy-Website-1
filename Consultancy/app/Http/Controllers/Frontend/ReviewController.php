<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client_review;
use App\AboutUs;
use App\Our_service;
use App\AbroadStudy;
use App\WebsiteContent;
use App\Navbar;
use App\Expert_Message;

class ReviewController extends Controller
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
        $arr['about'] = AboutUs::select('id', 'title')->get();
        $arr['nav_status'] = Navbar::first();
        return view('frontend.addreview')->with($arr);
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
    public function store(Request $request, Client_review $Client_review)
    {
        $this->validate($request, [
            'user_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
            'image' => 'required',
            'description' => 'required'

         ]);
        if ($request->hasFile('image')) {
            $destination = public_path("/images/ClientReview");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = str_random() . "." . $extension;
            $file->move($destination, $filename);
        } else {
            $filename = '';
        }
        // $a=$request->user_name;
        // dd($a);
        $ClientReview=new Client_review;
        $ClientReview->user_name = $request->user_name;
        $ClientReview->description = $request->description;
        $ClientReview->email = $request->email;
        $ClientReview->phone = $request->phone;
        $ClientReview->address = $request->address;
        $ClientReview->status = '0';
        $ClientReview->image = $filename;
        if ($ClientReview->save()) {
            return back()->with('success', 'Review Added Successfully');
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
