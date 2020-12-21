<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Volkan Kalay">
@yield('metatags')
  <title>@yield('title') @if(Request::segment(1)!=NULL)-@endif {{$config->title}}</title>
  <link rel="shortcut icon" href="{{$config->favicon}}" type="image/x-icon" />

  <!-- Bootstrap core CSS -->
  <link href="{{asset('front/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('front/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="{{asset('front/')}}/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{route('Homepage')}}">{{$config->title}}</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>


      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">


          <li class="nav-item">
            <a class="nav-link" href="{{route('Homepage')}}">Ana Sayfa</a>
          </li>

          @foreach($pages as $page)
            <li class="nav-item">
              <a class="nav-link" href="{{route('page',$page->slug)}}">{{$page->title}}</a>
            </li>
          @endforeach


          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">İletişim</a>
          </li>
        </ul>
      </div>


    </div>
  </nav>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('@yield('bg',$config->background)')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>@yield('title')</h2>
          </div>
        </div>
      </div>
    </div>
  </header>

    <!-- Main Content -->
    <div class="container-fluid">
      <div class="row">
