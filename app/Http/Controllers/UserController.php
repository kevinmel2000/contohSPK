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

        $type= "user";

        $user= new User([
            'email'=> $request->input('email'),
            'name' => $request->input('nama'),
            'password' => bcrypt($request->input('password')),
            'type' => $type,
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
        
       
        return view('users/user_hasil')->with(['diagnosa'=> $diagnosa, 'gejala' => $gejala ]);
    }

    public function postDiagnosa(Request  $request){
        $totalgejala=60;
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
        if ( ($arr3[5]==1) && ($arr3[11]==1)&& ($arr3[15]==1) && ($arr3[51]==1)&& ($arr3[52]==1)&&($arr3[53]==1)) {
            $id=1;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //Rule 2
        if ( ($arr3[1]==1) && ($arr3[2]==1)&&($arr3[3]==1) && ($arr3[4]==1) && ($arr3[6]==1)&& ($arr3[7]==1)&& ($arr3[9]==1)&& ($arr3[12]==1)&& ($arr3[20]==1)&& ($arr3[24]==1)) {
            $id=2;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //Rule 3
        if ( ($arr3[1]==1) && ($arr3[3]==1)&& ($arr3[6]==1) && ($arr3[12]==1)&& ($arr3[33]==1)&& ($arr3[34]==1)&& ($arr3[35]==1)) {
            $id=3;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //Rule4
        if ( ($arr3[1]==1) && ($arr3[9]==1)&& ($arr3[12]==1) && ($arr3[13]==1)&& ($arr3[16]==1)&&($arr3[17]==1)&& ($arr3[23]==1)) {
            $id=4;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //Rule5
        if ( ($arr3[27]==1) && ($arr3[36]==1)&& ($arr3[37]==1) && ($arr3[38]==1)&& ($arr3[39]==1)&&($arr3[40]==1)){
            $id=5;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //Rule6
         if ( ($arr3[1]==1) && ($arr3[5]==1)&& ($arr3[12]==1) && ($arr3[21]==1)&& ($arr3[22]==1)&&($arr3[32]==1)&& ($arr3[41]==1)) {
            $id=6;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }
        
         //Rule7
         if ( ($arr3[3]==1) && ($arr3[10]==4) && ($arr3[14]==1) && ($arr3[15]==1)&& ($arr3[19]==1)&& ($arr3[29]==1) && ($arr3[30]==1) && ($arr3[54]==1) && ($arr3[55]==1) ) {
            $id=7;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            echo ($penyakit);
        }

        //Rule 8
         if ( ($arr3[3]==1) && ($arr3[5]==4) && ($arr3[12]==1) && ($arr3[14]==1)&& ($arr3[37]==1)&& ($arr3[43]==1) && ($arr3[49]==1)) {
            $id=8;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //rule 9
         if ( ($arr3[3]==1) && ($arr3[5]==4) && ($arr3[10]==1) && ($arr3[12]==1)&& ($arr3[14]==1)&& ($arr3[37]==1) && ($arr3[43]==1) && ($arr3[49]==1)  ) {
            $id=9;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //rule10
         if ( ($arr3[1]==1) && ($arr3[3]==4) && ($arr3[9]==1) && ($arr3[15]==1)&& ($arr3[26]==1)&& ($arr3[45]==1) && ($arr3[46]==1) && ($arr3[47]==1) && ($arr3[48]==1) && ($arr3[49]==1) ) {
            $id=10;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //rule 11
        if ( ($arr3[1]==1) && ($arr3[16]==4) && ($arr3[17]==1) && ($arr3[18]==1)&& ($arr3[56]==1)&& ($arr3[57]==1) && ($arr3[58]==1) && ($arr3[59]==1) && ($arr3[60]==1)  ) {
            $id=11;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }

        //rule 12
        if ( ($arr3[1]==1) && ($arr3[2]==4) && ($arr3[3]==1) && ($arr3[4]==1)&& ($arr3[24]==1)&& ($arr3[25]==1) && ($arr3[26]==1) && ($arr3[27]==1) && ($arr3[28]==1) && ($arr3[33]==1)) {
            $id=12;
            $penyakit = PenyakitModel::where('id_penyakit',$id)->first();
            //echo ($penyakit);
        }
        
        

        
        $arr_p1=array("5","10","11","15","51","52","53");
        $result1=array_intersect($input,$arr_p1);      
        $c_01= count($result1);
        $c_02= count($arr_p1);
        $persen1= ($c_01/$c_02)*100;

        $arr_p2=array("1","2","3","4","6","7","9","12","20","24");
        $result2=array_intersect($input,$arr_p2);      
        $c_11= count($result2);
        $c_12= count($arr_p2);
        $persen2= ($c_11/$c_12)*100;

        $arr_p3=array("1","3","6","12","33","34","35");
        $result3=array_intersect($input,$arr_p3);      
        $c_21= count($result3);
        $c_22= count($arr_p3);
        $persen3= ($c_21/$c_22)*100;

        $arr_p4=array("1","9","12","13","16","17","23");
        $result4=array_intersect($input,$arr_p4);      
        $c_31= count($result4);
        $c_32= count($arr_p4);
        $persen4= ($c_31/$c_32)*100;

        $arr_p5=array("27","36","37","38","39","40");
        $result5=array_intersect($input,$arr_p5);      
        $c_41= count($result5);
        $c_42= count($arr_p5);
        $persen5= ($c_41/$c_42)*100;

        $arr_p6=array("1","5","12","21","22","32","41");
        $result6=array_intersect($input,$arr_p6);      
        $c_51= count($result6);
        $c_52= count($arr_p6);
        $persen6= ($c_51/$c_52)*100;

        $arr_p7=array("3","10","14","15","19","29","30","54","55");
        $result7=array_intersect($input,$arr_p7);      
        $c_61= count($result7);
        $c_62= count($arr_p7);
        $persen7= ($c_61/$c_62)*100;

        $arr_p8=array("3","5","12","14","37","43","49","50");
        $result8=array_intersect($input,$arr_p8);      
        $c_71= count($result8);
        $c_72= count($arr_p8);
        $persen8= ($c_71/$c_72)*100;

        $arr_p9=array("3","5","10","12","20","31","41","43","44");
        $result9=array_intersect($input,$arr_p9);      
        $c_81= count($result9);
        $c_82= count($arr_p9);
        $persen9= ($c_81/$c_82)*100;

        $arr_p10=array("1","3","9","15","26","45","46","47","48","49");
        $result10=array_intersect($input,$arr_p10);      
        $c_91= count($result10);
        $c_92= count($arr_p10);
        $persen10= ($c_91/$c_92)*100;


        $arr_p11=array("1","16","17","18","56","57","58","59","60");
        $result11=array_intersect($input,$arr_p11);      
        $c_101= count($result11);
        $c_102= count($arr_p11);
        $persen11= ($c_101/$c_102)*100;

        $arr_p12=array("1","2","3","4","24","25","26","27","28","33");
        $result12=array_intersect($input,$arr_p12);      
        $c_111= count($result12);
        $c_112= count($arr_p12);
        $persen12= ($c_111/$c_112)*100;

        $t_persen = array($persen1,$persen2,$persen3,$persen4,$persen5,$persen6,$persen7,$persen8,$persen9,$persen10,$persen11,$persen12);
        $p_big=$t_persen[0];
        $big=0;
        $big_index=0;
        $big_persen=0;
        
        for ($i=0; $i <12 ; $i++) { 
            if ($p_big<$t_persen[$i]) {
                $p_big=$t_persen[$i];
                $big_index=$i;
                
            }
        }
        
        $big_persen = $t_persen[$big_index];

        $diagnosa= new DiagnosaModel();
        $diagnosa->id_user = Auth::user()->id;
        $diagnosa->id_penyakit= $big_index;

        $namapenyakit = DB::table('penyakit')->where('id_penyakit',$big_index+1)->first();
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

    public function getDetailDiagnosa($id_diagnosa){
        $diagnosa = DiagnosaModel::find($id_diagnosa);
        $id_user = $diagnosa->id_user;
        $user = User::find($id_user);
        return view('users.user_detail_diagnosa')->with(['diagnosa'=>$diagnosa, 'user' => $user]);
    }

    public function getEditProfile(){
        $id_user = Auth::user()->id;
        $user= User::find($id_user);
         return view('users.user_edit')->with('user',$user);

    }

    public function postEditProfile(Request $req){
        $this->validate($req, [
            'nama'      => 'required|min:4',
            'alamat'    => 'required|min:4',
            'usia'      => 'required|numeric',
            'pekerjaan' => 'required|min:4'
         ]);

        $sex = $req->get('sex');

        $id_user = Auth::user()->id;
        $user= User::find($id_user);

        $user->name      = $req->input('nama');
        $user->alamat    = $req->input('alamat');
        $user->usia      = $req->input('usia');
        $user->pekerjaan = $req->input('pekerjaan');
        $user->sex       = $sex;

        $user->save();

        $message="akun anda berhasl diubah";
        return redirect()->back()->with('message',$message);

    }






}
