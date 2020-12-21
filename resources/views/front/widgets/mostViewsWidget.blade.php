<div class="card my-4">
  <h5 class="card-header bg-dark text-light">En Çok Okunanlar</h5>
    <div class="card-body">

        @foreach($mostviews as $mw)

        <a href="{{route('single', ['category' => $mw->getCategory->slug, 'slug' => $mw->slug])}}" class="text-decoration-none">
          <div class="row">
            <div class="col-md-4">
              <img src="{{$mw->image}}" class="img-fluid" style="max-height:110px;">
            </div>
            <div class="col-md-8">
              {{Str::limit($mw->title,26)}}
            </div>
          </div>
        </a>

            @if(!$loop->last)<hr>@endif
        @endforeach

    </div>
  </div>
