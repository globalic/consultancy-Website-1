<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Navbar;

class NavbarController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
  $arr['nav_status'] =Navbar::first();
  return view('backend.dashboard')->with($arr);
}
    
}
