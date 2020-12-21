@extends('back.layouts.master')
@section('title',$article->title.' yazısını düzenle')
@section('content')

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Yazı Oluştur</h6>
            </div>
            <div class="card-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                  <br>{{$error}}
                  @endforeach
                </div>
              @endif
              <form method="post" action="{{route('admin.yazilar.update',$article->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label class="font-weight-bolder">Yazı Başlığı:</label>
                  <input type="text" name="title" class="form-control" value="{{$article->title}}" required></input>
                </div>

                <div class="form-group">
                  <label class="font-weight-bolder">Kategori Seçin:</label>
                  <select class="form-control" name="category" required>
                    <option value="" disabled>Kategoriler</option>
                    @foreach($categories as $category)
                      <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label class="font-weight-bolder">Yazı Görseli:</label><br>
                  <img src="{{$article->image}}" style="max-width:200px;" class="img-fluid">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" >
                        <label class="custom-file-label" for="inputGroupFile04">Görsel Seç</label>
                      </div>
                    </div>
                </div>

              <div class="form-group">
                <label class="font-weight-bolder">Yazı:</label>
                <textarea id="editor" name="content" class="form-control" row=8>{{$article->content}}</textarea>
              </div>

              <div class="form-group">
                <label class="font-weight-bolder">Kısa Yazı:</label>
                <textarea name="semicontent" class="form-control" row=3>{{$article->semicontent}}</textarea>
                <small>Yazı Listelenirken Gösterilen Kısa Yazıdır.</small>
              </div>

              <div class="form-group">
                <label class="font-weight-bolder">Etiketler:</label>
                <input type="text" name="tags" class="form-control" value="{{$article->tags}}" required></input>
                <small>Etiketleri Virgül ',' ile ayırınız.</small>
              </div>

              <div class="form-group row justify-content-end">
                <button type="submit"  class="btn btn-warning btn-icon-split mr-3" name="status" value="0">
                  <span class="icon text-white-50">
                    <i class="fas fa-drafting-compass"></i>
                  </span>
                  <span class="text">
                    Güncelle ve Taslak Olarak Kaydet
                  </span>
                </button>
                <button type="submit"  class="btn btn-success btn-icon-split mr-3" name="status" value="1">
                  <span class="icon text-white-50">
                    <i class="far fa-paper-plane"></i>
                  </span>
                  <span class="text">
                    Güncelle Yayınla
                  </span>
                </button>
              </div>



              </form>
            </div>
          </div>
        </div>


@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function(){
  $('#editor').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
});
</script>
@endsection
