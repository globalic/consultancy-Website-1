<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
use App\WebsiteContent;


class PartnersController extends Controller
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
        $arr['partners']=Partner::all();
        $arr['website']=WebsiteContent::first();
        return view('Backend.partners.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();
        return view('Backend.partners.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Partner $Partner )
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
         ]);
         if ($request->hasFile('image')) {
           $destination_image = public_path("/images/Partners");
           $file_image = $request->image;
           $extension_image = $file_image->getClientOriginalExtension();
           $image_name = str_random() . "." . $extension_image;
           $file_image->move($destination_image, $image_name);
         }
           else {
               $image_name ='';
           }
        //    dd($image_name);
           $Partner=new Partner;
           $Partner->name = $request->name;  
           $Partner->link= $request->link;  
           $Partner->logo= $image_name;   
           if($Partner->save()){
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
        $arr['partners']=Partner::find($id);
        $arr['website']=WebsiteContent::first();
        return view('Backend.partners.edit')->with($arr);
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
            // $image_name= $request->prev_image;
            // dd($image_name);
           if(isset($request->image)&& $request->image->getClientOriginalName()) {
            $destination_image = public_path("/images/Partners");
            $file_image = $request->image;
            $extension_image = $file_image->getClientOriginalExtension();
            $image_name = str_random() . "." . $extension_image;
            $file_image->move($destination_image, $image_name);
           }
           else
           {
               $image_name= $request->prev_image;
           }
        //    dd($image_name);
           $id =  $request->id;
           $data['name'] = $request->name;
           $data['link'] = $request->link;
           $data['logo'] = $image_name;
           if (Partner::where('id',$id)->update($data)) {
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
        Partner::destroy($id);
        return redirect()->route('parteners.index');
    }
}
