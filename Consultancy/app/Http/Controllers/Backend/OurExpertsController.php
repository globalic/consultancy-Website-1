<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OurExperts;
use App\Expert_Message;
use App\WebsiteContent;


class OurExpertsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['Experts']=OurExperts::all();
        $arr['website']=WebsiteContent::first();
        return view('Backend.our_experts.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();
        return view('Backend.our_experts.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  OurExperts $OurExperts)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
            'position' => 'required'
         ]);
         if ($request->hasFile('image')) {
           $destination_image = public_path("/images/Experts");
           $file_image = $request->image;
           $extension_image = $file_image->getClientOriginalExtension();
           $image_name = str_random() . "." . $extension_image;
           $file_image->move($destination_image, $image_name);
         }
           else {
               $image_name ='';
           }
        //    dd($image_name);
           $OurExperts=new OurExperts;
           $OurExperts->name = $request->name;  
           $OurExperts->position= $request->position;  
           $OurExperts->image= $image_name;   
        
           if($OurExperts->save()){
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
        $arr['Expert']= OurExperts::find($id);
        $arr['website']=WebsiteContent::first();
        return view('Backend.our_experts.edit')->with($arr);
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
        $this->validate($request,[ 
           
            ]);
           if(isset($request->image)&& $request->image->getClientOriginalName()) {
            $destination_image = public_path("/images/Experts");
            $file_image = $request->image;
            $extension_image = $file_image->getClientOriginalExtension();
            $image_name = str_random() . "." . $extension_image;
            $file_image->move($destination_image, $image_name);
           }
           else
           {
               $image_name= $request->prev_image;
           }
           $id =  $request->id;
           $data['name'] = $request->name;
           $data['position'] = $request->position;
           $data['image'] = $image_name;
           if (OurExperts::where('id',$id)->update($data)) {
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
        $expert_messages= Expert_message::where("expert_id", "=", $id )->delete();
        OurExperts::destroy($id);
        return redirect()->route('our_experts.index');
    }
}


