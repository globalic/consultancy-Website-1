<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OurExperts;
use App\Expert_Message;
use App\WebsiteContent;

class ExpertMessagesController extends Controller
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
        $arr['expert']=OurExperts::all();
        $arr['messages']=Expert_Message::all();
        $arr['website']=WebsiteContent::first();
        return view('backend.expert_messages.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['experts']=OurExperts::all();
        $arr['website']=WebsiteContent::first();
        return view('backend.expert_messages.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Expert_Message $Expert_Message)
    {
        $Expert_message=new Expert_message;
        $Expert_message->title = $request->title;  
        $Expert_message->expert_id = $request->expert_id;  
        $Expert_message->message = $request->message; 
        $Expert_message->rank = $request->rank; 
        if($Expert_message->save()){
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
        $arr['experts']=OurExperts::all();

        $arr['message']=Expert_Message::find($id);
        $arr['website']=WebsiteContent::first();
        return view('backend.expert_messages.edit')->with($arr);
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
          
           $id =  $request->id;
           $data['expert_id'] = $request->expert_id;
           $data['title'] = $request->title;
           $data['rank'] = $request->rank;
           $data['message'] = $request->message;
           if (Expert_Message::where('id',$id)->update($data)) {
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
        Expert_Messages::destroy($id);
        return redirect()->route('expert-messages.index');
    }
}
