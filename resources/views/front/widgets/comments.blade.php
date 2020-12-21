<div class="container-fluid">
  <div class="card mx-5">
    <div class="card-header bg-dark text-light font-weight-bolder">
      Yorumlar

      <span class="float-right font-weight-lighter">{{$article->commentCount()}} adet yorum bulundu.</span>
    </div>
    <div class="card-body p-4">

      @foreach($comments as $comment)
      <div class="row border shadow-sm my-2 py-4" id="yorum{{$comment->id}}">
        <div class="col-md-2 mx-auto my-auto">
          <img src="{{asset('back/')}}/img/user.svg" class="img-fluid" style="max-width:96px;" >
        </div>

        <div class="col-md-10">

          <div class="row justify-content-between px-3">
            <div class="text-success">
              {{$comment->name}}
            </div>
            <div class="text-muted">
              <small>{{$comment->created_at->diffForHumans()}}</small>
            </div>

          </div>
          @if($comment->ifConnectedToComment)
          <small class="text-muted pl-4">
            <a class="text-decoration-none text-muted" href="#yorum{{$comment->getReply($comment->ifConnectedToComment)->id}}">
              {{$comment->getReply($comment->ifConnectedToComment)->name}}
            </a>
            'a yanıt olarak.
          </small>
          @endif
          <div class="py-2">
            {{$comment->comment}}
          </div>

          <div class="row justify-content-end mx-1">

            <a  class="btn btn-sm btn-light border mx-1" href="{{url()->current()}}#yorum{{$comment->id}}">
              <i class="fa fa-share-alt"></i>
            </a>

            <button class="btn btn-sm btn-light border" title="Yanıtla" comment-id="{{$comment->id}}"><i class="fa fa-reply"></i> {{$comment->replyCount()}}</button>
            <button class="btn btn-sm btn-light border mx-1 like-click" title="Beğen" comment-id="{{$comment->id}}"><i class="fa fa-thumbs-up"></i> {{$comment->like}}</button>
            <button class="btn btn-sm btn-light border dislike-click" title="Beğenme" comment-id="{{$comment->id}}"><i class="fa fa-thumbs-down font-weight-bold"></i> {{$comment->dislike}}</button>
          </div>
        </div>

      </div>
      @endforeach

    </div>

    @if($article->commentCount()>50)
    <div class="card-footer text-center">
      <div class="float-right mx-auto">{{$comments->links()}}</div>
    </div>
    @endif
  </div>
</div>

@section('js')
<script type="text/javascript">
$(function() {
  $('.like-click').click(function(){
    id = $(this)[0].getAttribute('comment-id');
    $.ajax({
      type:'GET',
      url:'{{route('comments.like')}}',
      data:{id:id},
      success:function(data){
        $('.like-click').each(function(){
          if(this.getAttribute('comment-id')==data.id){
          $(this).toggleClass('text-light bg-success');
          $(this).html('<i class="fa fa-thumbs-up"></i> '.concat(data.like));
          $(this).prop('disabled', true);
        }});
      }});
    });
  $('.dislike-click').click(function(){
    id = $(this)[0].getAttribute('comment-id');
    $.ajax({
      type:'GET',
      url:'{{route('comments.dislike')}}',
      data:{id:id},
      success:function(data){
        $('.dislike-click').each(function(){
          if(this.getAttribute('comment-id')==data.id){
          $(this).toggleClass('text-light bg-danger');
          $(this).html('<i class="fa fa-thumbs-down"></i> '.concat(data.dislike));
          $(this).prop('disabled', true);
        }});
      }});
    });
  })
</script>
@endsection
