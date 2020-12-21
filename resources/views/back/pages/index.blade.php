@extends('back.layouts.master')
@section('title','Bilgi Sayfaları')
@section('content')

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <h6 class="m-0 font-weight-bold text-primary">{{$pages->count()}} yazı bulundu.</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Fotoğraf</th>
                      <th>Başlık</th>
                      <th>İçerik</th>
                      <th>Sıra</th>
                      <th>İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pages as $page)
                    <tr>
                      <td class="text-center">
                        <img src="{{$page->image}}" class="img-fluid" width="100px">
                      </td>
                      <td>{{Str::limit($page->title,18)}}</td>
                      <td>{{Str::limit($page->content,24)}}</td>
                      <td>{{$page->order}}</td>
                      <td>

                        <a href="{{route('page', $page->slug)}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Görüntüle</a>
                        <a href="{{route('admin.page.edit',$page->id)}}" title="Düzenle" class="btn btn-sm btn-primary text-white text-decoration-none edit-click"><i class="fa fa-pen"></i> Düzenle</a>
                        <a page-id="{{$page->id}}" title="Sil" class="btn btn-sm btn-danger text-white text-decoration-none remove-click"><i class="fa fa-times"></i> Sil</a>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


                        <!-- Remove Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sayfayı Sil</h5>
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
                                  <form method="post" action="{{route('admin.delete.page')}}">
                                    @csrf
                                    <input type="hidden" name="id" id="id"/>
                                    <button type="submit" class="btn btn-danger">Sayfayı Sil</button>
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
        id = $(this)[0].getAttribute('page-id');
        $('#id').val(id);
        $('#articleAlert').html('Bilgi Sayfası Silinsin Mi?<br><small>Dikkat bu işlemin geri dönüşü yoktur!</small>');
        $('#deleteModal').modal();

      });

})

  </script>


@endsection
