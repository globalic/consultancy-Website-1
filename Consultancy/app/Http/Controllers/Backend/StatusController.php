<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client_review;
use App\WebsiteContent;
use App\Abroad_study_status;
use App\Expert_Message;
use App\Navbar;

class StatusController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
   public function status($id){
       $review = Client_review::select('id','status')->whereId($id)->first();
       if($review->status == 1)
       {
        $review->status = 0;
      } else {
        $review->status = 1;
      }
     if($review->update())
     {
    return back()->with('success','status changed successfully');
     }
     else{
       return back()->with('error','oops!! Something went wrong');
     }
  }

  public function abroad_study(){
    $navbar= Navbar::first();
    if($navbar->abroad_study == 1)
    {
     $navbar->abroad_study = 0;
   } else {
     $navbar->abroad_study = 1;
   }
  if($navbar->update())
  {
 return back()->with('success','Status Changed Successfully');
  }
  else{
    return back()->with('error','something Went Wrong');
  }
  }

  public function About_us(){
    $navbar = Navbar::first();
    if($navbar->about_us == 1)
    {
     $navbar->about_us = 0;
   } else {
    $navbar->about_us = 1;
  }
  if($navbar->update())
  {
 return back()->with('success','Status Changed Successfully');
  }
  else{
    return back()->with('error','something Went Wrong');
  }
  }

  public function services(){
    $navbar = Navbar::first();
    if($navbar->services == 1)
    {
     $navbar->services = 0;
   } else {
    $navbar->services = 1;
  }
  if($navbar->update())
  {
 return back()->with('success','Status Changed Successfully');
  }
  else{
    return back()->with('error','something Went Wrong');
  }
  }

  public function apply_online(){
    $navbar = Navbar::first();
    if($navbar->apply_online == 1)
    {
     $navbar->apply_online = 0;
   } else {
    $navbar->apply_online = 1;
  }
  if($navbar->update())
  {
 return back()->with('success','Status Changed Successfully');
  }
  else{
    return back()->with('error','something Went Wrong');
  }
  }
  public function gallery()
  {
    $navbar = Navbar::first();
    if($navbar->gallery == 1)
    {
     $navbar->gallery = 0;
   } else {
    $navbar->gallery = 1;
  }
  if($navbar->update())
  {
 return back()->with('success','Status Changed Successfully');
  }
  else{
    return back()->with('error','something Went Wrong');
  }
  }
   
  public function expert_messages(){
    $navbar = Navbar::first();
    if($navbar->expert_messages == 1)
    {
     $navbar->expert_messages = 0;
   } else {
    $navbar->expert_messages = 1;
  }
  if($navbar->update())
  {
 return back()->with('success','Status Changed Successfully');
  }
  else{
    return back()->with('error','something Went Wrong');
  }
  }

  public function apply(){
    $navbar = Navbar::first();
    if($navbar->apply_online == 1)
    {
     $navbar->apply_online = 0;
   } else {
    $navbar->apply_online = 1;
  }
  if($navbar->update())
  {
 return back()->with('success','Status Changed Successfully');
  }
  else{
    return back()->with('error','something Went Wrong');
  }
  }
 
  public function expert_review($id){
    $key = Expert_message::select('id','status')->whereId($id)->first();
    if($key->status == 1)
    {
     $key->status = 0;
   } else {
     $key->status = 1;
   }
  if($key->update())
  {
 return back()->with('success','status changed successfully');
  }
  else{
    return back()->with('error','oops!! Something went wrong');
  }
  }


}
