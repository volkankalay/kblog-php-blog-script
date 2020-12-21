@extends('back.layouts.master')
@section('title','Kategoriler')
@section('content')

          <div class="container-fluid row">
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample">
                  <div class="card-body">
                    <form method="post" action="{{route('admin.category.create')}}">
                      @csrf

                      <div class="form-row text-center">
                        <div class="mb-3">
                          <label>Kategori Adı</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="name"><i class="fa fa-bookmark"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" id="name" min="2" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group text-center">

                          <label>Durum</label><br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
                          <label class="form-check-label btn btn-sm btn-primary" for="status1">Açık</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                          <label class="form-check-label btn btn-sm btn-danger" for="status0">Kapalı</label>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-block btn-success my-3">Ekle</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>


                <div class="col-md-9 ">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Kategoriler</h6>
                    </div>
                    <div class="card-body">

                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Adı</th>
                              <th>Yazı Sayısı</th>
                              <th>Durum</th>
                              <th>İşlemler</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($categories as $category)
                            <tr>
                            <td>{{$category->id}}</td>
                              <td>{{Str::limit($category->name,18)}}</td>
                              <td>{{$category->articleCountWithDisabled()}}</td>
                              <td>
                                {!!$category->status==0 ? "<span class='text-light btn btn-warning'>Kapalı</span>" :"<span class='text-light btn btn-success'>Açık</span>" !!}
                              </td>
                              <td>
                                  <form method="post" action="{{route('admin.category.status',$category->id)}}" >
                                    @csrf
                                    <button type="submit" name="ackapa" value="{{$category->id}}" title="Durum" class="btn btn-sm @if($category->status==0)  btn-success @elseif($category->status==1) btn-danger @endif"><i class="fa fa-power-off"></i>@if($category->status==0)  Aç @elseif($category->status==1) Kapat @endif</button>

                                    <a category-id="{{$category->id}}" title="Düzenle" class="btn btn-sm btn-primary text-white text-decoration-none edit-click"><i class="fa fa-pen"></i> Düzenle</a>

                                    <a category-id="{{$category->id}}" category-count="{{$category->articleCountWithDisabled()}}" category-name="{{$category->name}}" title="Sil" class="btn btn-sm btn-danger text-white text-decoration-none remove-click"><i class="fa fa-times"></i> Sil</a>

                                  </form>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>
                </div>




        </div>


        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="post" action="{{route('admin.category.update')}}">
                  @csrf

                  <div class="form-group">
                    <label>Kategori Adı</label>
                    <input type="text" class="form-control" name="name" id="categoryName">
                  </div>
                  <div class="form-group">
                    <label>Kategori Slug(URL)</label>
                    <input type="text" class="form-control" name="slug" id="categorySlug">
                    <input type="hidden" class="form-control" name="id" id="category_id">
                  </div>


              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                <button type="submit" class="btn btn-success">Değişiklikleri Kaydet</button>
              </div>

              </form>

            </div>
          </div>
        </div>

                <!-- Remove Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategoriyi Sil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div id="articleAlert" class="alert alert-danger">
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                          <form method="post" action="{{route('admin.category.delete')}}">
                            @csrf
                            <input type="hidden" name="id" id="id"/>
                            <button type="submit" class="btn btn-danger">Kategoriyi Sil</button>
                          </form>
                      </div>


                    </div>
                  </div>
                </div>
@endsection
@section('js')

<script language="javascript">

    $(function() {
      $('.remove-click').click(function(){
        id = $(this)[0].getAttribute('category-id');
        count = $(this)[0].getAttribute('category-count');
        cName = $(this)[0].getAttribute('category-name');
        $('#id').val(id);
        if(count>0){
          $('#articleAlert').html('<b>'+cName+'</b> kategorisine ait <b>' +count+'</b> yazı bulunmaktadır. Kategoriyi silerseniz yazılar <b>en düşük ID değerine sahip kategoriye</b> aktarılacaktır!');
        }
        else{
          $('#articleAlert').html('<b>'+cName+'</b> kategorisine ait  ait yazı <b>bulunmamaktadır</b>.');
        }
        $('#deleteModal').modal();

      });

        $('.edit-click').click(function(){
          id = $(this)[0].getAttribute('category-id');
          $.ajax({
            type:'GET',
            url:'{{route('admin.category.getData')}}',
            data:{id:id},
            success:function(data){
              $('#categoryName').val(data.name);
              $('#categorySlug').val(data.slug);
              $('#category_id').val(data.id);
              $('#editModal').modal();
            }
          });
        });
})

  </script>


@endsection
