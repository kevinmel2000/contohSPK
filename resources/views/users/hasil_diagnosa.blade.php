@extends('layout.master')

@section('title')
    Halaman Diagnosa
@endsection

@section('content')

daftar diagnosa  {{$id}}
<table class="table hover">
	<thead>
		<th>Gejala Yang dialami</th>
		<th>Tanggal</th>
		<th>Lihat Detail</th>
	</thead>
	<tbody>
		@foreach($diagnosa as $d)
		<tr>
			<td>{{$d->id}}</td>
			<td>{{$d->created_at}}</td>
			<td><a href="{{route('user.hasildiagnosa',['id_diagnosa'=> $d->id])}}" class="btn btn-default btn-xs">Lihat</a></td>
		</tr>
		@endforeach
	</tbody>
</table>





@endsection