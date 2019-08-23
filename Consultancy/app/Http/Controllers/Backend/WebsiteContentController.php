<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use App\WebsiteContent;
use App\Abroad_Study_Status;
use App\Navbar;
class WebsiteContentController extends Controller
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
     $website = WebsiteContent::first();
     $abroad_status = Abroad_Study_Status::first();
     $nav = Navbar::first();
    return view('backend.settings.index',compact('website','abroad_status','nav'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, WebsiteContent $WebsiteContent)
    {
        if(!\Gate::allows('isWebAdmin')){
            abort(403,"the page you are looking for is not available");
        }

        $this->validate($request,[
            'address' => 'required',
            'fb_link' => 'required',
            'image' => 'required',
            'phone' =>'required',
            'email' => 'required',
            'header_image' => 'required'
         ]);
         if ($request->hasFile('image') && $request->hasFile('header_image') ) {
          //file destination
           $destination_logo = public_path("/images/company_logo");
           $destination_headerimage = public_path("/images/header_image");
           //request file
           $file_logo = $request->image;
           $file_header_image = $request->header_image;
           //extension
           $extension_logo = $file_logo->getClientOriginalExtension();
           $extension_header_image = $file_header_image->getClientOriginalExtension();
           //naming 
           $filename_logo = str_random() . "." . $extension_logo;
           $filename_header_image = str_rand() . "." .$extension_header_image;
           //move file
           $file_logo->move($destination_logo, $filename_logo);
           $file_header_image->move($destination_headerimage, $filename_header_image);
         }
          else {
            $filename_logo = '';
            $filename_header_image ='';
          }
           $websitecontent =new WebsiteContent;
           $websitecontent->name = $request->name;  
           $websitecontent->company_address = $request->address;  
           $websitecontent->facebook= $request->fb_link;  
           $websitecontent->phone = $request->phone; 
           $websitecontent->email = $request->email; 
           $websitecontent->logo = $filename_logo;  
           $websitecontent->header_image = $filename_header_image;     
           $websitecontent->google_plus = $request->google_plus;       
           if($websitecontent->save()){
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteContent $WebsiteContent)
    {
        if(!\Gate::allows('isWebAdmin')){
            abort(403,"the page you are looking for is not available");
        }
        // $a= $request->image;
        // dd($a);
        if($request->hasFile('image') && $request->hasFile('header_image')) {
       //file destination
       $destination_logo = public_path("/images/company_logo");
       $destination_headerimage = public_path("/images/header_image");
       //request file
       $file_logo = $request->image;
       $file_header_image = $request->header_image;
       //extension
       $extension_logo = $file_logo->getClientOriginalExtension();
       $extension_header_image = $file_header_image->getClientOriginalExtension();
       //naming 
       $filename_logo = str_random() . "." . $extension_logo;
       $filename_header_image = str_rand() . "." .$extension_header_image;
       //move file
       $file_logo->move($destination_logo, $filename_logo);
       $file_header_image->move($destination_headerimage, $filename_header_image);
          }
          else if($request->hasFile('image')){
            $destination_logo = public_path("/images/company_logo");
            $file_logo = $request->image;
            $extension_logo = $file_logo->getClientOriginalExtension();
            $filename_logo = str_random() . "." . $extension_logo;
            $file_logo->move($destination_logo, $filename_logo);
            $filename_header_image= $request->prev_header_image;
           }
           else if($request->hasFile('header_image')){
            $destination_headerimage = public_path("/images/header_image");
            $file_header_image = $request->header_image;
            $extension_header_image = $file_header_image->getClientOriginalExtension();
            $filename_header_image = str_random() . "." .$extension_header_image;
            $file_header_image->move($destination_headerimage, $filename_header_image);
            $filename_logo= $request->prev_logo;
           }
           else{
            $filename_logo= $request->prev_logo;
            $filename_header_image= $request->prev_header_image;
           }

            // dd($filename);
            $id = $request->id;
            $data['name'] = $request->name;  
            $data['company_address'] = $request->address;  
            $data['facebook']= $request->fb_link;  
            $data['phone'] = $request->phone; 
            $data['email'] = $request->email; 
            $data['google_plus'] = $request->google_plus;
            $data['logo'] = $filename_logo;      
            $data['header_image'] = $filename_header_image;    

            if (WebsiteContent::where('id',$id)->update($data)) {
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
        //
    }
}
