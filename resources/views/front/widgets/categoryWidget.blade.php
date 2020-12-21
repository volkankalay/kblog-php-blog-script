@isset($categories)
                          <!-- Category Widget -->
          <div class="card my-4">
            <h5 class="card-header bg-dark text-light">Kategoriler</h5>
              <div class="list-group">
                @foreach($categories as $cat)
                <a href="{{route('category',$cat->slug)}}" class="text-decoration-none">
                <button type="button"
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                @if(Request::segment(1)==$cat->slug) btn-light active @endif
                ">
                  {{$cat->name}}
                  <span class="badge badge-dark badge-pill">{{$cat->articleCount()}}</span></button>
                </a>
                @endforeach
              </div>
          </div>
@endif
