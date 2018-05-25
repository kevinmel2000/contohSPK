@extends('layout.master')

@section('title')
    Halaman Profile
@endsection

@section('content')
@include('notif.notif')

    <div class="jumbotron">
		  <h1>Selamat datang di sistem pakar diagnosa penyakit anak </h1>
		  <p> Sistem ini dirancang untuk membantu anda dalam mendeteksi penyakit pada anak</p>
		
	</div>
	<hr>


<div class="row">
  <div class="col-md-4"> 
	 <div class="row">
	  <div class="col-sm-12 col-md-12">
	    <div class="thumbnail">
	      <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/256x256/plain/plus.png" height="100" width="100">
	      <div class="caption">
	        <h3>Daftar Diagnosa</h3>
	        <p>List diagnosa yang pernah anda lakukan</p>
	         <a href="#" class="btn btn-default" role="button">Lihat</a></p>
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
		        <h3>Pengaturan akun anda</h3>
		        <p>pengaturan pasword dan username anda</p>
		         <a href="#" class="btn btn-default" role="button">Lihat</a></p>
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

@endsection

