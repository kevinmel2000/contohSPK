@extends('layout.master')

@section('title')
    Halaman Utama
@endsection

@section('content')

     <div class="page-header">
 		 <h1>Silahkan Login terlebih dahulu</h1>
 		 <h5>jika belum ada akun, <a href="{{route('guest.daftar')}}">daftar diisni </a> </h5>
	</div>
	

	<div class="well">
	<hr>
	<div >
		<form class="form-horizontal" action="{{route('post.login')}}" method="post">
		  <div class="form-group">
		    <label for="email" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="email" name="email" placeholder="Email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="password" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Login</button>
		      		{{ csrf_field() }}
		    </div>
		  </div>
		</form>
	</div>
</div>
<hr>



@endsection

