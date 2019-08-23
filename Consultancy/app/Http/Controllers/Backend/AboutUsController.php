<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WebsiteContent;
Use App\AboutUs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $arr['AboutUs']=AboutUs::all();
        $arr['website']=WebsiteContent::first();
        return view('backend.about_us.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();
        return view('backend.about_us.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AboutUs $AboutUs)
    {
        $this->validate($request,[
            'title' => 'required|min:10|max:25',
            'image' => 'required',
            'short_description' => 'required|min:150|max:250'
         ]);
         if ($request->hasFile('image')) {
           $destination = public_path("/images/AboutUs");
           $file = $request->image;
           $extension = $file->getClientOriginalExtension();
           $filename = str_random() . "." . $extension;
           $file->move($destination, $filename);
           $AboutUs=new AboutUs;
           $AboutUs->title = $request->title;  
           $AboutUs->description = $request->description;   
           $AboutUs->short_description = $request->short_description; 
           $AboutUs->image = $filename;       
           $AboutUs->save();
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
        $arr['AboutUs']=AboutUs::find($id);
        $arr['website']=WebsiteContent::first();
        return view('backend.about_us.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $AboutUs)
    {
        $this->validate($request,[
            'title' => 'required|min:10|max:25',
            'short_description' => 'required|min:150|max:250'
         ]);
        if(isset($request->image)&& $request->image->getClientOriginalName()) {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis') . rand(1, 99999) . '.' . $ext;
            $request->image->move(public_path().'/images/AboutUs', $file);
        }
        else
        {
            $file = $request->prev_image;
        }
        $id =  $request->id;
        $data['image'] = $file;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['short_description']= $request->short_description; 
        if (AboutUs::where('id',$id)->update($data)) {
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
        AboutUs::destroy($id);
        return redirect()->route('AboutUs.index');
    }
}
