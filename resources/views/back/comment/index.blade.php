@extends('back.layouts.master')
@section('title','Yorumlar')
@section('content')

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              {{$commentCount}}

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Ad Soyad</th>
                      <th>E-Posta</th>
                      <th>Yazı</th>
                      <th>Mesaj</th>
                      <th>Gönderim Tarihi</th>
                      <th>İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($comments as $comment)
                    <tr>
                      <td>{{$comment->id}}</td>
                      <td>{{$comment->name}}</td>
                      <td>{{$comment->email}}</td>
                      <td>{{$comment->article_id}}</td>
                      <td><textarea class="form-control" rows="3" cols="50" disabled> {{$comment->comment}}</textarea></td>
                      <td>{{$comment->created_at->diffForHumans()}}</td>
                      <td class="text-center">
                      @if($comment->status == 0)
                      <a href="#" class="btn btn-success btn-sm btn-block"><i class="fa fa-check-circle"></i> Onayla</a>
                      @else
                      <a href="#" class="btn btn-warning btn-sm btn-block"><i class="fa fa-times-circle"></i> Kaldır</a>
                      @endif

                      <a href="#" class="btn btn-danger btn-sm btn-block"><i class="fa fa-times-circle"></i> Sil</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="h4">
                İşaretler ve Anlamları
              </div>
              <div>
                <span class="btn btn-success btn-sm col-md-2"><i class="fa fa-check-circle"></i> Onayla</span> <i class="fa fa-arrow-right"></i> Yorumu onaylar. İlgili yazının bulunduğu sayfada görünmesini sağlar.
              </div>
              <div class="my-1">
                <span class="btn btn-warning btn-sm col-md-2"><i class="fa fa-times-circle"></i> Kaldır</span> <i class="fa fa-arrow-right"></i> Yorumun onayını kaldırır. İlgili yorumu yayından kaldırır.
              </div>
              <div>
                <span class="btn btn-danger btn-sm col-md-2"><i class="fa fa-times-circle"></i> Sil</span> <i class="fa fa-arrow-right"></i> Yorumu siler. Yorumu tamamen siler. Bu işlemin geri dönüşü yoktur!
              </div>

            </div>
          </div>
        </div>


@endsection
