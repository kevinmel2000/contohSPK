@extends('layout.master')

@section('title')
    Halaman Profile
@endsection

@section('content')
@include('notif.notif')


<div class="row">

  <div class="col-md-4"> 
	 <div class="row">
	  <div class="col-sm-12 col-md-12">
	    <div class="thumbnail">
	      <img src="http://i64.tinypic.com/1zmyp39.png" height="100" width="100">
	      <div class="caption">
	        <h3>Daftar Diagnosa</h3>
	        <p>List diagnosa yang pernah anda lakukan</p>
	         <a href="{{(route('user.daftarhasil'))}}" class="btn btn-default" role="button">Lihat</a></p>
	      </div>
	    </div> 
	  </div>
	</div>
  </div>

  <div class="col-md-4">
		 <div class="row">
		  <div class="col-sm-12 col-md-12">
		    <div class="thumbnail">
		      <img src="http://i68.tinypic.com/987xpz.png" height="100" width="100">
		      <div class="caption">
		        <h3>Pengaturan akun anda</h3>
		        <p>pengaturan Informasi dasar anda</p>
		         <a href="{{route('user.editprofile')}}" class="btn btn-default" role="button">Lihat</a></p>
		      </div>
		    </div> 
		  </div>
		</div>
  </div>

  <div class="col-md-4">
		<div class="row">
			 <div class="col-sm-12 col-md-12">
			  <div class="thumbnail">
			      <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/256x256/plain/plus.png" height="100" width="100">
			      <div class="caption">
			        <h3>Tambah Diagnosa baru</h3>
			        <p>Periksa dan deteksi gejala pada anak anda</p>
			         <a href="{{route('user.diagnosa')}}" class="btn btn-default" role="button">Lihat</a></p>
			      </div>
			    </div> 
			  </div>
		</div>
  </div>

</div>
<div class="row">

  <div class="col-md-4"> 
	 <div class="row">
	  <div class="col-sm-12 col-md-12">
	    <div class="thumbnail">
	      <img src="http://i64.tinypic.com/bhx7ao.png" height="100" width="100">
	      <div class="caption">
	        <h3>Daftar Penyakit </h3>
	        <p>List Penyakit yang ada</p>
	         <a href="{{route('user.penyakit')}}" class="btn btn-default" role="button">Lihat</a></p>
	      </div>
	    </div> 
	  </div>
	</div>
  </div>



</div>



@endsection

