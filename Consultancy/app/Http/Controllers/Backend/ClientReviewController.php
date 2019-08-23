<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client_review;
use App\WebsiteContent;

class ClientReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $arr['reviews']=Client_review::all();
        $arr['website']=WebsiteContent::first();
        return view('backend.client_review.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();
        return view('backend.client_review.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client_review $Client_review)
    {
        $this->validate($request,[
            'user_name' => 'required',
            'image' => 'required',
            'description' => 'required'
         ]);
         if ($request->hasFile('image')) {
           $destination = public_path("/images/ClientReview");
           $file = $request->image;
           $extension = $file->getClientOriginalExtension();
           $filename = str_random() . "." . $extension;
           $file->move($destination, $filename);
         }
         else{
             $filename ='';
         }
           $ClientReview=new Client_review;
           $ClientReview->user_name = $request->user_name;  
           $ClientReview->description = $request->description;   
           $ClientReview->image = $filename; 
           if($ClientReview->save()){
           return back()->with('success','Successfully uploaded');
           }
         else{
             return back()->with('error','Something went wrong.');
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
        $arr['review']=Client_review::find($id);
        $arr['website']=WebsiteContent::first();
        return view('backend.client_review.description')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr['review']=Client_review::find($id);
        $arr['website']=WebsiteContent::first();
        return view('backend.client_review.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client_review $Client_review)
    {
        if(isset($request->image)&& $request->image->getClientOriginalName()) {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis') . rand(1, 99999) . '.' . $ext;
            $request->image->move(public_path().'/images/ClientReview', $file);
        }
        else
        {
            $file = $request->prev_image;
        }
        $id =  $request->id;
       
        $data['image'] = $file;
        $data['user_name'] = $request->user_name;
        $data['description'] = $request->description;
        if (Client_review::where('id',$id)->update($data)) {
            return back()->with('success', 'The record has been successfully updated');
        }
        else{
            return back()->with('error','oops!! something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client_review::destroy($id);
        return redirect()->route('ClientReview.index');
    }
}
