@extends('layout.master')

@section('title')
    Halaman penyakit
@endsection

@section('content')

daftar diagnosa 
<table class="table hover">
	<thead>
		<th>Nama Penyakit</th>
		<th>Lihat Detail</th>
	</thead>
	<tbody>
		@foreach($penyakit as $p)
		<tr>
			<td>{{$p->nama_penyakit}}</td>
			<td><a href="{{route('user.detailpenyakit',['id'=> $p->id_penyakit])}}" class="btn btn-default btn-xs">Lihat</a></td>
		</tr>
		@endforeach
	</tbody>
</table>



@endsection