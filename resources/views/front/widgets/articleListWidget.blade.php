
                @foreach($articles as $article)
                  <div class=" card post-preview">
                <a href="{{route('single',[$article->getCategory->slug, $article->slug])}}" class="text-decoration-none">
                    <h5 class="card-header bg-dark text-light">{{$article->title}}</h5>
                  </a>
                    <div class="card-body row no-gutters">
                        <div class="col-md-4 text-center">
                          <img src="{{$article->image}}" class="card-img img-fluid" style="max-height:320px; max-width:320px;" alt="{{$article->title}}">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">{{Str::limit($article->semicontent,191)}}</p>
                            <p class="card-text text-muted text-right">

                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="card-footer shadow-lg bg-light text-dark small">

                      <a href="{{route('category',$article->getCategory->slug)}}" class="text-decoration-none">
                        <i class="fa fa-folder-open"></i>
                        {{$article->getCategory->name}}
                      </a>
                        <i class="fa fa-clock-o ml-2"></i>
                        {{$article->created_at->diffForHumans()}}
                        <i class="fa fa-eye ml-2"></i>
                        {{$article->hit}}
                        <i class="fa fa-comments-o ml-2"></i>
                        {{$article->commentCount()}}


                      <a href="{{route('single',[$article->getCategory->slug, $article->slug])}}" class="text-decoration-none">
                        <span class="float-right">
                          <i class="fa fa-arrow-right"></i>
                          Devamını oku...
                        </span>
                      </a>
                      </div>

                  </div>
                <br/>

                  @if($loop->iteration % 2 == 0)
                    @include('front.widgets.ads.horizontalAdWidget')
                  @endif

                @endforeach

                <!-- Pager -->
                <div class="float-right mx-auto">
                        {{$articles->links()}}
                </div>
