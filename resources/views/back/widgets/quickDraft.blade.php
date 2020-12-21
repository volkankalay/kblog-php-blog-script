<div class="col-md-4">
  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardDraft" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Hızlı Taslak Oluştur</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapseCardDraft">
      <div class="card-body">
        <form method="post" action="{{route('admin.article.quick')}}">
          @csrf
          <div class="form-group">
            <label class="font-weight-bolder">Kategori Seçin:</label>
            <select class="form-control" name="category" required>
              <option value="" disabled>Kategoriler</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label class="font-weight-bolder">Yazı Başlığı:</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}" required></input>
          </div>

          <div class="form-group">
            <label class="font-weight-bolder">Yazı:</label>
              <textarea id="editor" name="content" class="form-control" row=8>{{old('content')}}</textarea>
          </div>

          <button type="submit" class="btn btn-block btn-success my-3">Oluştur</button>
        </form>

      </div>
    </div>
  </div>
</div>
