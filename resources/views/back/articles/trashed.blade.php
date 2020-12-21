@extends('back.layouts.master')
@section('title','Geri Dönüşüm Kutusu')
@section('content')

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">


              <h6 class="m-0 font-weight-bold text-primary">{{$articles->count()}} yazı bulundu.</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Fotoğraf</th>
                      <th>Başlık</th>
                      <th>Kategori</th>
                      <th>Hit</th>
                      <th>Silinme Tarihi</th>
                      <th>İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($articles as $article)
                    <tr>
                    <td>{{$article->id}}</td>
                      <td>
                        <img src="{{$article->image}}" class="img-fluid" width="100px">
                      </td>
                      <td>{{Str::limit($article->title,18)}}</td>
                      <td>{{Str::limit($article->getCategory->name,18)}}</td>
                      <td>{{$article->hit}}</td>
                      <td>{{$article->deleted_at->toDateString()}}</td>
                      <td>

                        <a href="{{route('admin.hardDelete.article',$article->id)}}" class="btn btn-danger btn-icon-split btn-sm float-right m-1">
                          <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                          </span>
                          <span class="text">Sil</span>
                        </a>
                        <a href="{{route('admin.recover.article',$article->id)}}" class="btn btn-success btn-icon-split btn-sm float-right m-1">
                          <span class="icon text-white-50">
                              <i class="fas fa-recycle"></i>
                          </span>
                          <span class="text">Kurtar</span>
                        </a>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


@endsection
