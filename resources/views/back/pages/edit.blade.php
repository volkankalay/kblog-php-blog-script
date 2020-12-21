@extends('back.layouts.master')
@section('title',$page->title.' Sayfasını Düzenle')
@section('content')

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sayfa Düzenle</h6>
            </div>
            <div class="card-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                  <br>{{$error}}
                  @endforeach
                </div>
              @endif
              <form method="post" action="{{route('admin.page.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$page->id}}"/>
                <div class="form-group">
                  <label class="font-weight-bolder">Sayfa Başlığı:</label>
                  <input type="text" name="title" class="form-control" value="{{$page->title}}" required></input>
                </div>

                <div class="form-group">
                  <label class="font-weight-bolder">Sayfa Görseli:</label><br>
                  <img src="{{$page->image}}" style="max-width:200px;" class="img-fluid">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="inputGroupFile04">Görsel Seç</label>
                      </div>
                    </div>
                </div>

              <div class="form-group">
                <label class="font-weight-bolder">Sayfa İçeriği:</label>
                <textarea id="editor" name="content" class="form-control" row=8>{{$page->content}}</textarea>
              </div>
              <div class="form-group">
                <label class="font-weight-bolder">Sayfa Sırası:</label>
                <input type="number" name="order" class="form-control" value="{{$page->order}}" required></input>
              </div>

              <div class="form-group row justify-content-end">
                <button type="submit"  class="btn btn-success btn-icon-split mr-3">
                  <span class="icon text-white-50">
                    <i class="far fa-save"></i>
                  </span>
                  <span class="text">
                    Kaydet & Yayınla
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
