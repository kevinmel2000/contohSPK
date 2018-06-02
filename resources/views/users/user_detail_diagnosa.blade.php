@extends('layout.master')

@section('title')
    Halaman Diagnosa
@endsection

@section('content')



<div class="panel panel-default">
  <div class="panel-body">
      <center><h2> Laporan Hasil Diagnosa </h2></center>
      <hr>
      <h4><p style="text-align:right">Tanggal:{{$diagnosa->created_at}} </p></h4>
      <h4>No. Diagnosa  :{{$diagnosa->id}}</h4>
      <h4>Nama					: {{$user->name}}</h4>
      <h4>Alamat				: {{$user->alamat}}</h4>
      <h4>Gender   			: @if   ($user->sex === 0)
      								Laki-Laki
      							  @else
      							  	Perempuan
      							  @endif </h4>
      <h4>Pekerjaan 			: {{$user->pekerjaan}}</h4>
      <h4>Hasil Diagnosa		: {{$diagnosa->nama}} Dengan Probabilitas {{$diagnosa->persen}} %</h4>
      <br>
      <br>
      <h4><p style="text-align:left">(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp)</p></h4>
      <h4><p style="text-align:right">(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp)</p></h4>
      <h4><p style="text-align:left">Petugas     </p></h4>  <h4><p style="text-align:right">  Perawat /Dokter    </p></h4>
      <h4><p style="text-align:left">NIP     </p></h4>  <h4><p style="text-align:right">   NIP     </p></h4>
  </div>
</div>



@endsection