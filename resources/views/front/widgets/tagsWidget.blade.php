<div class="text-center text-muted small">
  Etiketler:
      @if($article->tags)
      @php
        $tags=Str::of($article->tags)->explode(',')
      @endphp
        @foreach($tags as $tag)
<a href="{{route('tag',Str::of($tag)->trim())}}">
          {{$tag}}@if(!$loop->last),@endif
</a>
        @endforeach
      @endif
</div>
