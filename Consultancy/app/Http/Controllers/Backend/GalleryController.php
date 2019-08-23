<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\WebsiteContent;
class GalleryController extends Controller
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
        $arr['gallery']=Gallery::all();
        $arr['website']=WebsiteContent::first();
       return view('backend.gallery.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();
        return view('backend.gallery.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Gallery $Gallery)
    {
        $this->validate($request,[
            'image' => 'required'
         ]);
         if ($request->hasFile('image')) {
           $destination = public_path("/images/gallery");
           $file = $request->image;
           $extension = $file->getClientOriginalExtension();
           $filename = str_random() . "." . $extension;
           $file->move($destination, $filename);

           $Gallery=new Gallery;
           $Gallery->title = $request->title;  
           $Gallery->description = $request->description;   
           $Gallery->image = $filename;       
           $Gallery->save();
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
       $arr['gallery']=Gallery::find($id);
        $arr['website']=WebsiteContent::first();
        return view('backend.gallery.edit')->with($arr);
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
               $ext = $request->image->getClientOriginalExtension();
               $file = date('YmdHis') . rand(1, 99999) . '.' . $ext;
               $request->image->move(public_path().'/images/Gallery', $file);
           }
           else
           {
               $file = $request->prev_image;
           }
           $id =  $request->id;
          
           $data['image'] = $file;
              $a =$request->title;
           $data['title'] = $request->title;
           $data['description'] = $request->description;
           if (Gallery::where('id',$id)->update($data)) {
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
        Gallery::destroy($id);
        return redirect()->route('slider.index');
    }
}
