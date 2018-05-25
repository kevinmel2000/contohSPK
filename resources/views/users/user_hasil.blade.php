@extends('layout.master')

@section('title')
    Halaman Diagnosa
@endsection

@section('content')

<h3>Hasil Diagnosa</h3> 
<hr>
<div class="panel panel-default">
	<div class="panel-heading">
        <h3 class="panel-title"> Daftar Gejala yang dialami</h3>
    </div>

	<table class="table hover">
	<thead>
		
	</thead>
	<tbody>
		@foreach($gejala as $g)
		<tr>			
			<td>{{$g->nama}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<hr>

Penyakit yang mungkin adalah <b>{{$diagnosa->nama}}</b> dengan probabilitas sebesar <b>{{$diagnosa->persen}}%</b>




@endsection