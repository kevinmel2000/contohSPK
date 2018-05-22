<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use App\User;
use App\PenyakitModel;
use App\GejalaModel;

class UserController extends Controller
{
    //
    public function getLandingPage(){
    	return view('users.user_landing_page');
    }

    public function getLandingPage_Admin(){
    	return view('admin.admin_landing_page');
    }

     public function getLogout(){
    	Auth::logout(); 
    	return redirect()->route('guest.home');
    }

    public function postLogin(Request $request){
    	 $this->validate($request, [
            'email'     => 'email|required',
            'password'  => 'required|min:4'
         ]);

      if( (Auth::attempt(['email'=> $request->input('email'),'password'=>$request->input('password')])) && (Auth::user()->type=='user')   )
         {
             if (Session::has('oldUrl')){
                 $oldUrl = Session::get('oldUrl');
                 Session::forget('oldUrl');
                 return redirect()->to($oldUrl);
             }
         return redirect()->route('user.landing'); //bila login sukses ke halaman profile user
         }

      else if((Auth::attempt(['email'=> $request->input('email'),'password'=>$request->input('password')])) && (Auth::user()->type=='admin') ){
             if (Session::has('oldUrl')){
                 $oldUrl = Session::get('oldUrl');
                 Session::forget('oldUrl');
                 return redirect()->to($oldUrl);
             }
      	 return redirect()->route('admin.landing'); // login ke halaman admin
      }

         else{
             return redirect()->back(); //kalo gagal refresh ulang 
         }

       }


     public function postSignup(Request  $request){
        $this->validate($request,[
            'email'    => 'email|required|unique:users',
            'password' => 'required|min:4',
            'nama'     => 'required|min:4'
        ]);

        $user= new User([
            'email'=> $request->input('email'),
            'name' => $request->input('nama'),
            'password' => bcrypt($request->input('password')),
            'type' => 'user'
        ]);
        $user->save();

        $message= "sukses buat akun, silahkan ke halaman login";
        return redirect()->back()-> with ('message', $message);
        /*
        Auth::login($user);
       if (Session::has('oldUrl')){
           $oldUrl = Session::get('oldUrl');
           Session::forget('oldUrl');
           return redirect()->to($oldUrl);
       }

        $message= "selamat anda sudah berhasil membuat akun";
        return redirect()->route('user.landing')->with('message',$message);*/
    }


    public function getDiagnosa(){
        $gejala= GejalaModel::all();
        return view('users.user_diagnosa')->with('sakit', $gejala);


    }

    public function getHasilDiagnosa($total){
        return view('users/user_hasil')->with(['count'=> $total]);
    }

    public function postDiagnosa(Request  $request){

        $count=0;
        $input= $request->input('gejala');
        
        $count = count($input);
        
        $arr2=[43];
        $arr3=[43];

        for ($i=0; $i < 43; $i++) { 
            $arr2[$i]=0;
            $arr3[$i]=0;
        }

        for ($i=0; $i < $count; $i++) { 
            $arr2[$i]= $input[$i];
        }

        for ($i=0; $i < 43; $i++) { 
            $x= $arr2[$i];
            $arr3[$x]=1;
        }



        dd($arr3);

       
        return redirect()->route('user.hasildiagnosa',['count' => $count ]);

    }





}
