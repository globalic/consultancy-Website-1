<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WebsiteContent;
use App\AbroadStudy;
use App\Abroad_Study_Status;

class AbroadStudyController extends Controller
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
        $arr['AbroadStudy']=AbroadStudy::all();
        $arr['website']=WebsiteContent::first();
        $arr['status']= Abroad_Study_Status::first();
        return view('backend.abroad_study.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();
       return view('backend.abroad_study.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:25',
            'image' => 'required',
        
         ]);
         if ($request->hasFile('image')) {
           $destination = public_path("/images/AbroadStudy");
           $file = $request->image;
           $extension = $file->getClientOriginalExtension();
           $filename = str_random() . "." . $extension;
           $file->move($destination, $filename);
           $AbroadStudy=new AbroadStudy;
           $AbroadStudy->title = $request->title;  
           $AbroadStudy->description = $request->description;   
           $AbroadStudy->short_description = $request->short_description; 
           $AbroadStudy->image = $filename;       
           $AbroadStudy->save();
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
        $arr['website']=WebsiteContent::first();
        $arr['abroadstudy']=AbroadStudy::find($id);
        return view('backend.abroad_study.edit')->with($arr);
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
            'title' => 'required|max:25'
         ]);
        if(isset($request->image)&& $request->image->getClientOriginalName()) {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis') . rand(1, 99999) . '.' . $ext;
            $request->image->move(public_path().'/images/AbroadStudy', $file);
        }
        else
        {
            $file = $request->prev_image;
        }
        $id =  $request->id;
        $data['image'] = $file;
        $data['title'] = $request->title;
        $data['short_description'] = $request->short_description;
        $data['description'] = $request->description;
        if (AbroadStudy::where('id',$id)->update($data)) {
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
        AbroadStudy::destroy($id);
        return redirect()->route('AbroadStudy.index');
    }
}
