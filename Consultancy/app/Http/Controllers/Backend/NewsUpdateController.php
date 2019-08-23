<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsUpdate;
use App\WebsiteContent;

class NewsUpdateController extends Controller
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
        $arr['NewsUpdates']=NewsUpdate::all();
        $arr['website']=WebsiteContent::first();
        return view('backend.news_updates.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();
        return view('backend.news_updates.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, NewsUpdate $NewsUpdate)
    {
        $this->validate($request,[
            'title' => 'required|min:10|max:25',
            'image' => 'required',
            'author_image' =>'required',
            'short_description' => 'required|min:100|max:200'
          
         ]);
         if ($request->hasFile('image') && $request->hasfile('author_image')) {
           $destination_image = public_path("/images/NewsUpdates/News_updates_image");
           $destination_author_image = public_path("/images/NewsUpdates/News_updates_author");
           $file_image = $request->image;
           $file_author_image = $request->author_image;
           $extension_image = $file_image->getClientOriginalExtension();
           $extension_author_image = $file_author_image->getClientOriginalExtension();
           $image_name = str_random() . "." . $extension_image;
           $author_image_name = str_random() . "." . $extension_author_image;
           $file_image->move($destination_image, $image_name);
           $file_author_image->move($destination_author_image, $author_image_name);
           $NewsUpdate=new NewsUpdate;
           $NewsUpdate->title = $request->title;  
           $NewsUpdate->short_description = $request->short_description;  
           $NewsUpdate->description = $request->description;
           $NewsUpdate->image= $image_name;   
           $NewsUpdate->author_image = $author_image_name;    
           $NewsUpdate->author_name = $request->author_name;    
           $NewsUpdate->save();
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
        $arr['news']=NewsUpdate::find($id);
        $arr['website']=WebsiteContent::first();
        return view('backend.news_updates.edit')->with($arr);
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
            'title' => 'required|min:10|max:25',
            
            'author_name' =>'required',
            'short_description' => 'required|min:100|max:200'
          
         ]);
        if(isset($request->image)&& $request->image->getClientOriginalName() && isset($request->author_image) && $request->author_image->getClientOriginalName()) {
            $destination_image = public_path("/images/NewsUpdates/News_updates_image");
            $destination_author_image = public_path("/images/NewsUpdates/News_updates_author");
            $file_image = $request->image;
            $file_author_image = $request->author_image;
            $extension_image = $file_image->getClientOriginalExtension();
            $extension_author_image = $file_author_image->getClientOriginalExtension();
            $image_name = str_random() . "." . $extension_image;
            $author_image_name = str_random() . "." . $extension_author_image;
            $file_image->move($destination_image, $image_name);
            $file_author_image->move($destination_author_image, $author_image_name);
        }
        else if(isset($request->image)&& $request->image->getClientOriginalName())
        {
            $destination_image = public_path("/images/NewsUpdates/News_updates_image");
            $file_image = $request->image;
            $extension_image = $file_image->getClientOriginalExtension();
            $image_name = str_random() . "." . $extension_image;
            $file_image->move($destination_image, $image_name);
            $author_image_name =  $request->prev_author_image;
        }
        else if(isset($request->author_image)&& $request->author_image->getClientOriginalName()){
            $destination_author_image = public_path("/images/NewsUpdates/News_updates_author");
            $file_author_image = $request->author_image;
            $extension_author_image = $file_author_image->getClientOriginalExtension();
            $author_image_name = str_random() . "." . $extension_author_image;
            $file_author_image->move($destination_author_image, $author_image_name);
            $image_name =  $request->prev_image;
        }
        else{
            $image_name =  $request->prev_image;
            $author_image_name=  $request->prev_author_image;
        }
        $id =  $request->id;
        $data['image'] = $image_name;
        $data['author_image'] = $author_image_name;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['short_description'] = $request->short_description;
        if (NewsUpdate::where('id',$id)->update($data)) {
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
        NewsUpdate::destroy($id);
        return redirect()->route('NewsUpdates.index');
    }
}
