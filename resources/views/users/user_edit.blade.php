@extends('layout.master')

@section('title')
    Halaman Edit Info 
@endsection

@section('content')

<h3> Edit Informasi Dasar User</h3>
<hr>

<div class="well">
      @include('notif.notif')
    
         
       
        <div class="form-group">
          <form action="{{route('user.posteditprofile')}}" method="post">
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" class="form-control" value="{{$user->name}}">
        </div>
         <div class="form-group">
          <label for="nama">Alamat</label>
          <input type="text" id="alamat" name="alamat" class="form-control" value="{{$user->alamat}}">
        </div>
         <div class="form-group">
          <label for="nama">Usia</label>
          <input type="text" id="usia" name="usia" class="form-control" value="{{$user->usia}}">
        </div>
         <div class="form-group">
          <label for="nama">Pekerjaan</label>
          <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="{{$user->pekerjaan}}">
        </div>
        <label> Jenis Kelamin  </label>
         <select class="form-control" name="sex">
          <option value="{!! $user->sex= 1 !!}">Perempuan</option>
          <option value="{!! $user->sex= 0 !!}">Laki-Laki</option>
         </select>
       </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-gratipay" aria-hidden="true"></i> Simpan </button> 
        {{ csrf_field() }}
    
      </form>
     </div>


@endsection