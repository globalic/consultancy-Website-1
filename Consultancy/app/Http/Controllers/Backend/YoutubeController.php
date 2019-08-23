<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Youtube;
use App\WebsiteContent;

class YoutubeController extends Controller
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
        $arr['youtube']=Youtube::all();
        $arr['website']=WebsiteContent::first();
        return view('backend.youtube.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['website']=WebsiteContent::first();
        return view('backend.youtube.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Youtube $Youtube)
    {
        // $a = $request->iframe;
        //  dd($a);
        $this->validate($request,[
            'title' => 'required|max:50',
            'short_description' => 'required|max:500',
            'iframe' => 'required'
         ]);
         
           $Youtube=new Youtube;
           $Youtube->title = $request->title;  
           $Youtube->description = $request->description;   
           $Youtube->short_description = $request->short_description;
           $Youtube->iframe = $request->iframe;  
           if($Youtube->save()){
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
        $arr['youtube']=Youtube::find($id);
        $arr['website']=WebsiteContent::first();
        return view('backend.youtube.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Youtube $Youtube)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'short_description' => 'required|max:500',
            'iframe' => 'required'
         ]);
        $id =  $request->id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['short_description']  = $request->short_description;
        $data['iframe'] = $request->iframe;
        if (Youtube::where('id',$id)->update($data)) {
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
        Youtube::destroy($id);
        return redirect()->route('Youtube.index');
    }
}
