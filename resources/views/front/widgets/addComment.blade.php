<div class="container-fluid my-4">
  <div class="card mx-5">
    <div class="card-header bg-dark text-light font-weight-bolder">
      Bir Yorum Yaz...
    </div>
    <div class="card-body p-4">

      @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
      @endif

      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif

            <form method="post" action="{{route('comments.add')}}">
              @csrf
              <input type="text" value="{{$article->id}}" name="article" hidden>
              <input type="text" value="" name="replyto" hidden>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Ad Soyad*</label>
                  <input type="text" class="form-control" value="{{old('adsoyad')}}" placeholder="Ad Soyad*" name="adsoyad" required>
                </div>
              </div>
              <div class="control-group p-1 ">
                <div class="form-group floating-label-form-group controls">
                  <label>E-Posta Adresi*</label>
                  <input type="email" class="form-control" value="{{old('email')}}" placeholder="E-Posta Adresi*" name="email" required>
                </div>
              </div>
              <div class="control-group p-1">
                <div class="form-group floating-label-form-group controls">
                  <label>Yorum</label>
                  <textarea rows="3" class="form-control" placeholder="Yorumunuz" name="mesaj" required>{{old('mesaj')}}</textarea>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <button type="submit" class="btn btn-secondary btn-block shadow col-md-4 mx-auto mx-1">Gönder</button>
            </form>

    </div>


  </div>
</div>
