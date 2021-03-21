@if($config->active==0)
  @include('front.widgets.deactive')

@elseif($config->active==2)
  @include('front.widgets.maintenance')

@else

@include('front.layouts.header')
@yield('content')
@include('front.layouts.footer')

@endif
