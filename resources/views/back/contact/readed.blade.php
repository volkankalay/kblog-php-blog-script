@extends('back.layouts.master')
@section('title','Tamamlanan İletişim Talepleri')
@section('content')

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">

              <a href="{{route('admin.contact.index')}}" class="btn btn-info btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                  <i class="fas fa-envelope"></i>
                </span>
                <span class="text">Okunmamış Mesajlar</span>
              </a>


            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Ad Soyad</th>
                      <th>E-Posta</th>
                      <th>Konu</th>
                      <th>Mesaj</th>
                      <th>Son İşlem Tarihi</th>
                      <th>İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                      <td>{{$contact->id}}</td>
                      <td>{{$contact->name}}</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->topic}}</td>
                      <td><textarea class="form-control" rows="4" cols="50" disabled> {{$contact->message}}</textarea></td>
                      <td>{{$contact->updated_at->diffForHumans()}}</td>
                      <td>
                        <a href="{{route('admin.contact.read',$contact->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tamamlanmadı</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{route('admin.contact.deleteall')}}" class="btn btn-danger btn-sm">Okunmuş Talepleri Sil</a>
            </div>
          </div>
        </div>


@endsection
