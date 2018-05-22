@extends('layout.master')

@section('title')
    Halaman Diagnosa
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Daftar Gejala</h3>
  </div>
  <div class="panel-body">
     	
     	<div class="container">
		  <h2>Silahkan isi gejala</h2>
		  <p>berdasarkan apa yang anak anda alami</p>
		  <hr>
		  <form action="{{route('user.postdiagnosa')}}" method="post">

		  	@foreach($sakit as $s)
		    <div class="checkbox">
		      <label><input type="checkbox" name="gejala[]" value="{!! $s->kode_gejala !!}">{{ $s->nama_gejala}}</label>
		    </div>
		   @endforeach


		    <hr>
		    <button class="btn btn-primary"> Selesai </button>
		      {{ csrf_field() }}
		  </form>
		</div>

  </div>
</div>



@endsection