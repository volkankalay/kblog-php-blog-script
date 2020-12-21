@extends('back.layouts.master')
@section('title','Tüm Yazılar')
@section('content')

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">

              <a href="{{route('admin.yazilar.geridonusum')}}" class="btn btn-warning btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                  <i class="fas fa-trash"></i>
                </span>
                <span class="text">Geri Dönüşüm Kutusu</span>
              </a>

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
                      <th>Oluşturulma Tarihi</th>
                      <th>Son Güncelleme</th>
                      <th>Durum</th>
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
                      <td>{{Str::limit($article->getCategory->name,19)}}</td>
                      <td>{{$article->hit}}</td>
                      <td>{{$article->created_at->toDateString()}}</td>
                      <td>{{$article->updated_at->diffForHumans()}}</td>
                      <td>
                        {!!$article->status==0 ? "<span class='text-light btn btn-warning'>Taslak</span>" :"<span class='text-light btn btn-success'>Aktif</span>" !!}
                      </td>
                      <td>
                        <a href="{{route('single',[$article->getCategory->slug, $article->slug])}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="{{route('admin.yazilar.edit',$article->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                        <a href="{{route('admin.delete.article',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        <a href="{{route('admin.onOff.article',$article->id)}}" title="OnOff" class="btn btn-sm btn-warning"><i class="fa fa-power-off"></i></a>
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
