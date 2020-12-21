@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('metatags')
<!-- Facebook Meta Etiketleri -->
<meta property="og:url"           content="{{url()->current()}}" />
<meta property="og:type"          content="article" />
<meta property="og:locale"        content="tr_TR" />
<meta property="og:title"         content="{{$article->title}}" />
<meta property="og:description"   content="{{Str::limit($article->content,80)}}" />
<meta property="og:image"         content="{{$article->image}}" />
<!-- Twitter Meta Etiketleri -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{$article->title}}" />
<meta name="twitter:description" content="{{Str::limit($article->content,80)}}" />
<meta name="twitter:url" content="{{url()->current()}}" />
<meta name="twitter:image" content="{{$article->image}}" />
@endsection
@section('content')
      <div class="col-md-9 mx-auto">
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <h2 class="section-heading mb-3">{{$article->title}}</h2>
          {!! $article->content !!}
        </div>
      </div>
    </div>
  </article>

  <div class="small text-muted text-right mr-5 pr-3">
    {{$article->created_at->diffForHumans()}}
    <br>
    Okunma Sayısı: {{$article->hit}}
  </div>
@include('front.widgets.tagsWidget')
<br>
@include('front.widgets.shareWidget')
@include('front.widgets.ads.horizontalAdWidget')
@include('front.widgets.addComment')
@include('front.widgets.comments')
</div>
        <div class="col-md-3 mx-auto">
@include('front.widgets.searchWidget')        <!--Arama Eklentisi-->
@include('front.widgets.categoryWidget')      <!--//Kategoriler Eklentisi-->
@include('front.widgets.ads.miniAdWidget')  <!--Mini Reklam Kodu Eklentisi-->
@include('front.widgets.mostViewsWidget') <!-- Slider Eklentisi -->

        </div>
@endsection
