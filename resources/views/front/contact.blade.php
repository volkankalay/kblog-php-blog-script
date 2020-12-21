@extends('front.layouts.master')
@section('title','İletişim')
@section('bg',asset('front/').'/img/contact-bg.jpg')
@section('content')


      <div class="col shadow p-5 m-3">
          <div class="text-center h3 p-5">
            İletişim Bilgileri
          </div>
          <hr/>
              <div class="text-center p-5">
                {{$config->telefon}}<br><br>
                {!!$config->adres!!}
              </div>




      </div>



<div class="col-lg-8 col-md-10 mx-auto">
  @if(session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
  @endif

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

        <form class=" shadow p-2 m-3" method="post" action="{{route('contact.post')}}">
          @csrf
          <div class="control-group p-1 ">
            <div class="form-group floating-label-form-group controls">
              <label>Ad Soyad</label>
              <input type="text" class="form-control" value="{{old('adsoyad')}}" placeholder="Ad Soyad" name="adsoyad" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group p-1 ">
            <div class="form-group floating-label-form-group controls">
              <label>Email Adresi</label>
              <input type="email" class="form-control" value="{{old('email')}}" placeholder="E-mail Adresiniz" name="email" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group p-1 ">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Konu</label>
              <input type="tel" class="form-control" value="{{old('konu')}}" placeholder="Konu" name="konu" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group p-1">
            <div class="form-group floating-label-form-group controls">
              <label>Mesaj</label>
              <textarea rows="5" class="form-control" placeholder="Mesajınız" name="mesaj" >{{old('mesaj')}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-secondary btn-block shadow col-md-6 mx-auto mb-3">Gönder</button>
        </form>
      </div>

@endsection
