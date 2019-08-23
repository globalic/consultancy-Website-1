<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Our_Service;
use App\WebsiteContent;
class OurServiceController extends Controller
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
        $arr['OurServices']=Our_Service::all();
        $arr['website']=WebsiteContent::first();
        return view('backend.our_services.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();

        return view('backend.our_services.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Our_Service $Our_service)
    {
        $this->validate($request,[
            'title' => 'required|min:10|max:25',
            'image' => 'required',
            'short_description' => 'required|min:150|max:200'
         ]);
         if ($request->hasFile('image')) {
           $destination_image = public_path("/images/OurService/OurService_image");
           $file_image = $request->image;
           $extension_image = $file_image->getClientOriginalExtension();
           $image_name = str_random() . "." . $extension_image;
           $file_image->move($destination_image, $image_name);
           $Our_Service=new Our_Service;
           $Our_Service->title = $request->title;  
           $Our_Service->short_description = $request->short_description;  
           $Our_Service->description = $request->description;
           $Our_Service->image= $image_name;   
        
           $Our_Service->save();
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
        $arr['OurService']=Our_Service::find($id);
        $arr['website']=WebsiteContent::first();
        return view('backend.our_services.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Our_Service $Our_service)
    {
        $this->validate($request,[
            'title' => 'required|min:10|max:25',
            'short_description' => 'required|min:150|max:200'
         ]);
        if(isset($request->image)&& $request->image->getClientOriginalName() ) {
            $destination_image = public_path("/images/OurService/OurService_image");
            $file_image = $request->image;
            $extension_image = $file_image->getClientOriginalExtension();
            $image_name = str_random() . "." . $extension_image;
            $file_image->move($destination_image, $image_name);
        }
        else{
            $image_name =  $request->prev_image;
        }
        $id =  $request->id;
        $data['image'] = $image_name;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['short_description'] = $request->short_description;
        if (Our_Service::where('id',$id)->update($data)) {
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
        Our_Service::destroy($id);
        return redirect()->route('OurService.index');
    }
}
