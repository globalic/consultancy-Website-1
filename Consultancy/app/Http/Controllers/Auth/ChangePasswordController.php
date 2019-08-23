<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\WebsiteContent;
use App\User;

class ChangePasswordController extends Controller
{
    public function index(Request $request)
    {
        $arr['website']=WebsiteContent::first();
        $id = Auth::user()->id;
        $arr['user']= User::find($id);
        return view('auth.passwords.change')->with($arr);
   }
   public function store($id)
   {
       $user = User::find($id);
      
       if (Hash::check(Input::get('current_password'), $user['password'])
           && Input::get('new_password') == Input::get('confirm_password')) {
           $user->password = bcrypt(Input::get('new_password'));
           $user->save();
           return back()->with('success', 'Password Changed');
       } else {
           return back()->with('error', 'Password didnot Matched!!');
       }
   }
}
