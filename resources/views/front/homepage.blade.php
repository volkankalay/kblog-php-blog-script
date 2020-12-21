@extends('front.layouts.master')

@section('content')

      <div class="col-md-9 mx-auto">
@include('front.widgets.articleListWidget')        <!--Yazılar Eklentisi-->
      </div>

        <div class="col-md-3 mx-auto">

@include('front.widgets.searchWidget')        <!--Arama Eklentisi-->
@include('front.widgets.categoryWidget')      <!--Kategoriler Eklentisi-->
@include('front.widgets.ads.miniAdWidget')  <!--Mini Reklam Kodu Eklentisi-->
@include('front.widgets.mostViewsWidget') <!-- Slider Eklentisi -->

        </div>
@endsection
