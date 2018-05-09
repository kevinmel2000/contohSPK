<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Session;

class GuestController extends Controller
{
    //uuntuk ngatur authenticate user balik ke halaman login 

    public function getGuestHome(){
    	if (Auth::check()){
    		  if (Auth::user()->type=='user') {
    		  	return redirect()->route('user.landing');
    		  }
    		  else if (Auth::user()->type=='admin') {
    		  	return redirect()->route('admin.landing');
    		  }
    	}
    	else{
    		return view('guest.beranda');
    	}
    	
    }

    public function getSignup(){
        return view('guest.daftar');
    }

}
