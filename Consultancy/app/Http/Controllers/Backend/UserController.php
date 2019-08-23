<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\WebsiteContent;

class UserController extends Controller
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
        if(!\Gate::allows('isWebAdmin')){
            abort(403,"the page you are looking for is not available");
        }
        $arr['website']=WebsiteContent::first();
        $arr['users']=User::all();
        return view('backend.users.index')->with($arr);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!\Gate::allows('isWebAdmin')){
            abort(403,"the page you are looking for is not available");
        }
        $arr['website']=WebsiteContent::first();
        return view('backend.users.add')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $User)
    {
        if(!\Gate::allows('isWebAdmin')){
            abort(403,"the page you are looking for is not available");
        }
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|',
            
         ]);
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        if($user->save()){
            return back()->with('success','Admin Added Successfully');
        }
        else{
            return back()->with('error','OOPS!! something went wrong ');
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
        if(!\Gate::allows('isWebAdmin')){
            abort(403,"the page you are looking for is not available");
        }
     $user = User::find($id);
     $website=WebsiteContent::first();
     return view('backend.users.edit',compact('user','website'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        if(!\Gate::allows('isWebAdmin')){
            abort(403,"the page you are looking for is not available");
        }
        // $this->validate($request,[
        //     'name' => 'max:255',
        //     'email' => 'email|max:255|unique:users',
        //     'password' => 'min:6',
            
        //  ]);
        $id =  $request->id;
       
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        if (User::where('id',$id)->update($data)) {
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
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
