@extends('back.layouts.master')
@section('title','Profilim')
@section('content')


<div class="col-md-3">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Profil Detayları</h6>
    </div>
  <div class="card-body text-center">

    <div class=" text-center">
      <div class="mb-3">
            <img src="{{asset('back')}}/img/user.svg" class="img-fluid" width="192px">
      </div>
    </div>

      <div class="text-center">
        <div class="mb-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="name"><i class="fa fa-user-tie"></i></span>
            </div>
            <input type="text" name="name" class="form-control" id="name" min="2" value="{{$admin->name}}" disabled>
          </div>
        </div>
      </div>

      <div class="text-center">
        <div class="mb-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="name"><i class="fa fa-at"></i></span>
            </div>
            <input type="text" name="name" class="form-control" id="name" min="2" value="{{$admin->email}}" disabled>
          </div>
        </div>
      </div>

      <div class="dropdown-divider"></div>

    <div class="text-center my-1">
      <button type="button" class="btn btn-block btn-primary btn-sm shadow" data-toggle="modal" data-target="#changeNameModal">
        <span class="icon text-white-50">
          <i class="fas fa-user-tie fa-sm text-white-50"></i>
        </span>
        <span class="text">Kimlik Değiştir</span>
      </button>
    </div>

    <div class="text-center my-1">
      <button type="button" class="btn btn-block btn-info btn-sm shadow" data-toggle="modal" data-target="#changeMailModal">
        <span class="icon text-white-50">
          <i class="fas fa-at fa-sm text-white-50"></i>
        </span>
        <span class="text">E-Mail Değiştir</span>
      </button>
    </div>

    <div class="text-center my-1">
      <button type="button" class="btn btn-block btn-warning btn-sm shadow" data-toggle="modal" data-target="#changePassModal">
        <span class="icon text-white-50">
          <i class="fas fa-lock fa-sm text-white-50"></i>
        </span>
        <span class="text">Şifre Değiştir</span>
      </button>
    </div>

    </div>
  </div>
</div>

  <div class="col-md-9">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Giriş Kayıtları</h6>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>IP</th>
              <th>Tarayıcı / İşletim Sistemi</th>
              <th>Tarih</th>
            </tr>
          </thead>
          <tbody>
            @foreach($logins as $login)
            <tr>
              <td>{{$login->ip_address}}</td>
              <td>{{$login->user_agent}}</td>
              <td>{{$login->giris}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>


    </div>

  </div>

  @if($errors->any())
      <div class="alert alert-danger my-2">
        @foreach($errors->all() as $error)
          <b>{{$error}}<br></b>
        @endforeach
      </div>
  @endif
</div>


@include('back.widgets.changeName')
@include('back.widgets.changeMail')
@include('back.widgets.changePass')
@endsection
