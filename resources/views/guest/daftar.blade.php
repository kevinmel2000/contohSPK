@extends('layout.master')

@section('title')
    Halaman Daftar
@endsection

@section('content')

 <div class="page-header">
 		 <h1>Silahkan Daftar,</h1>
 		 <h5>jika sudah ada akun, <a href="{{route('guest.home')}}">masuk diisni </a> </h5>
	</div>

 
    <div class="well">
    	@include('notif.notif')
    
				 <form action="{{route('guest.post_daftar')}}" method="post">
				 <div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" id="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" id="nama" name="nama" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary"><i class="fa fa-gratipay" aria-hidden="true"></i> Daftar </button> 
				{{ csrf_field() }}
		
			</form>
     </div>
@endsection
