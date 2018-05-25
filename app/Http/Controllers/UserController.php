<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use App\User;
use App\PenyakitModel;
use App\GejalaModel;
use App\DiagnosaModel;
use App\DiagnosaGejalaModel;
use Illuminate\Support\Facades\DB;

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

    public function getHasilDiagnosa($id_diagnosa){
        $gejala= DiagnosaGejalaModel::where('id_diagnosa',$id_diagnosa)->get();
        $diagnosa = DiagnosaModel::find($id_diagnosa);

       
        return view('users/user_hasil')->with(['diagnosa'=> $diagnosa, 'gejala' => $gejala]);
    }

    public function postDiagnosa(Request  $request){
        $totalgejala=43;
        $count=0;
        $input= $request->input('gejala');
        
        $count = count($input);
        
        $arr2=[$totalgejala];
        $arr3=[$totalgejala];

        for ($i=0; $i < $totalgejala; $i++) { 
            $arr2[$i]=0;
            $arr3[$i]=0;
        }

        for ($i=0; $i < $count; $i++) { 
            $arr2[$i]= $input[$i];
        }

        for ($i=0; $i<$totalgejala; $i++) { 
            $x= $arr2[$i];
            if ($x==0) {
               $arr3[$x]=0;
            }
            else{
                 $arr3[$x]=1;  
            }
           
        }

        

       //Rule 1
        if ( ($arr3[1]==1) && ($arr3[2]==1)&& ($arr3[11]==1) && ($arr3[12]==1)&& ($arr3[13]==1)&&($arr3[14]==1)&&($arr3[15]==1)) {
            $id=2;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            echo ($penyakit);
        }

        //Rule 2
        if ( ($arr3[1]==1) && ($arr3[11]==1)&& ($arr3[23]==1) && ($arr3[24]==1)&& ($arr3[25]==1)) {
            $id=5;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            echo ($penyakit);
        }

        //Rule 3
        if ( ($arr3[1]==1) && ($arr3[4]==1)&& ($arr3[20]==1) && ($arr3[21]==1)&& ($arr3[22]==1)) {
            $id=4;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            echo ($penyakit);
        }

        //Rule4
        if ( ($arr3[1]==1) && ($arr3[2]==1)&& ($arr3[16]==1) && ($arr3[17]==1)&& ($arr3[18]==1)&&($arr3[19]==1)) {
            $id=3;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            echo ($penyakit);
        }

        //Rule5
        if ( ($arr3[1]==1) && ($arr3[2]==1)&& ($arr3[3]==1) && ($arr3[4]==1)&& ($arr3[5]==1)&&($arr3[6]==1)&&($arr3[7]==1)&&($arr3[8]==1)&&($arr3[9]==1)&&($arr3[10]==1)) {
            $id=1;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            echo ($penyakit);
        }

        //Rule6
         if ( ($arr3[1]==1) && ($arr3[11]==1)&& ($arr3[23]==1) && ($arr3[26]==1)&& ($arr3[27]==1)&&($arr3[28]==1)) {
            $id=6;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            echo ($penyakit);
        }
        
         //Rule7
         if ( ($arr3[1]==1) && ($arr3[11]==4)&& ($arr3[29]==1) && ($arr3[30]==1)) {
            $id=7;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            echo ($penyakit);
        }

        

        
        $arr_p1=array("1","2","11","12","13","14","15");
        $result1=array_intersect($input,$arr_p1);      
        $c_01= count($result1);
        $c_02= count($arr_p1);
        $persen1= ($c_01/$c_02)*100;

        $arr_p2=array("1","15","23","24","25");
        $result2=array_intersect($input,$arr_p2);      
        $c_11= count($result2);
        $c_12= count($arr_p2);
        $persen2= ($c_11/$c_12)*100;

        $arr_p3=array("1","4","20","21","22");
        $result3=array_intersect($input,$arr_p3);      
        $c_21= count($result3);
        $c_22= count($arr_p3);
        $persen3= ($c_21/$c_22)*100;

        $arr_p4=array("1","2","16","17","18","19");
        $result4=array_intersect($input,$arr_p4);      
        $c_31= count($result4);
        $c_32= count($arr_p4);
        $persen4= ($c_31/$c_32)*100;

        $arr_p5=array("1","2","3","4","5","6","7","8","9","10");
        $result5=array_intersect($input,$arr_p5);      
        $c_41= count($result5);
        $c_42= count($arr_p5);
        $persen5= ($c_41/$c_42)*100;

        $arr_p6=array("1","11","23","26","27","28");
        $result6=array_intersect($input,$arr_p6);      
        $c_51= count($result6);
        $c_52= count($arr_p6);
        $persen6= ($c_51/$c_52)*100;

        $arr_p7=array("1","4","24","29","30");
        $result7=array_intersect($input,$arr_p7);      
        $c_61= count($result7);
        $c_62= count($arr_p7);
        $persen7= ($c_61/$c_62)*100;

        $t_persen = array($persen1,$persen2,$persen3,$persen4,$persen5,$persen6,$persen7);
        $p_big=$t_persen[0];
        $big=0;
        $big_index=0;
        $big_persen=0;
        
        for ($i=0; $i <7 ; $i++) { 
            if ($p_big<$t_persen[$i]) {
                $p_big=$t_persen[$i];
                $big_index=$i;
                
            }
        }

        $big_persen = $t_persen[$big_index];

        $diagnosa= new DiagnosaModel();
        $diagnosa->id_user = Auth::user()->id;
        $diagnosa->id_penyakit= $big_index;

        $namapenyakit = DB::table('penyakit')->where('id_penyakit',$big_index)->first();
        $diagnosa->nama = $namapenyakit->nama_penyakit;
        $diagnosa->persen = $big_persen;
        $diagnosa->save();

        for ($i=0; $i < $count ; $i++) { 
            $diagnosa_gejala = new DiagnosaGejalaModel;
            $diagnosa_gejala->id_diagnosa = $diagnosa->id;
            $diagnosa_gejala->id_gejala= $input[$i];
            
            $nama=DB::table('gejala')->where('kode_gejala',$input[$i])->first();
            $diagnosa_gejala->nama= $nama->nama_gejala;

            $diagnosa_gejala->save();
        }


        /*
        echo($p_big);
        echo ($big_index);
        dd($t_persen);
        */

        $pesan= "Diagnosa Telah dibuat, silahkan cek hasil dan nilai ";

        
        
        return redirect()->route('user.daftarhasil')->with(['message'=> $pesan]);

    }


    public function getHalamanHasil(){
        $nama=Auth::user()->name;
        $id= Auth::user()->id;
        $diagnosa=  DiagnosaModel::where('id_user',$id)->get();
        return view('users.hasil_diagnosa')->with(['id'=> $nama, 'diagnosa' => $diagnosa]);
    }






}
