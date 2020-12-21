@extends('front.layouts.master')
@section('title',$tag.' İçin Sonuçlar')
@section('content')
      <div class="col-md-9 mx-auto">
      @if(count($articles)>0)
      <div class="text-center border-bottom m-4 p-4 alert alert-light shadow col-md-6 mx-auto">
        <b>{{$tag}}</b> sorgusuna ait <b>{{$articles->total()}}</b> adet yazı bulundu.
      </div>
      @else
      <div class="text-center border-bottom m-4 p-4 alert alert-warning shadow col-md-6 mx-auto">
        <b>{{$tag}}</b> sorgusuna ait yazı bulunamadı.
      </div>
      @endif

@include('front.widgets.articleListWidget')        <!--Yazılar Eklentisi-->
      </div>

        <div class="col-md-3 mx-auto">

@include('front.widgets.searchWidget')        <!--Arama Eklentisi-->
@include('front.widgets.categoryWidget')      <!--//Kategoriler Eklentisi-->
@include('front.widgets.ads.miniAdWidget')  <!--Mini Reklam Kodu Eklentisi-->

        </div>
@endsection
