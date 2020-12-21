@extends('back.layouts.master')
@section('title','Sayfa Ayarları')
@section('content')
              <div class="container-fluid">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                    </div>
                    <div class="card-body">
                      @if($errors->any())
                        <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                          <br>{{$error}}
                          @endforeach
                        </div>
                      @endif
                      <form method="post" action="{{route('admin.ayarlar.update',$config->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                  <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label class="font-weight-bolder">Site Başlığı:</label>
                          <input type="text" name="title" class="form-control" value="{{$config->title}}" required></input>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Site Durumu</label><br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="1" @if($config->active==1) checked @endif>
                            <label class="form-check-label btn btn-sm btn-success" for="status1">Açık</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status0" value="0" @if($config->active==0) checked @endif>
                            <label class="form-check-label btn btn-sm btn-danger" for="status0">Kapalı</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="2" @if($config->active==2) checked @endif>
                            <label class="form-check-label btn btn-sm btn-primary" for="status2">Bakım Modu</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="text">Ana Sayfa Görseli:</div>
                        <img src="{{$config->background}}" width="100px" height="100px" class="img-fluid my-2">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="background" class="custom-file-input" id="inputGroupFile04">
                            <label class="custom-file-label" for="inputGroupFile04">Görsel Seç (Max:2MB)</label>
                          </div>
                        </div>
                      </div>
                        <div class="col">
                          <div class="text">Favicon:</div>
                          <img src="{{$config->favicon}}" width="100px" height="100px" class="img-fluid my-2">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="favicon" class="custom-file-input" id="inputGroupFile05" aria-describedby="inputGroupFileAddon05" >
                              <label class="custom-file-label" for="inputGroupFile05">Favicon Seç (Max:512KB)</label>
                            </div>
                          </div>
                      </div>
                  </div>


                        <div class="dropdown-divider"></div>
                        <h5>İletişim Bilgileri</h5>
                          <small>İletişim sayfasında görünür.</small>

                        <div class="form-group">
                              <label class="font-weight-bolder">Telefon:</label>
                              <input type="text" name="telefon" class="form-control" value="{{$config->telefon}}" ></input>
                        </div>

                        <div class="form-group">
                              <label class="font-weight-bolder">Adres: <small>HTML destekler.</small></label>
                              <textarea type="text" name="adres" class="form-control">{{$config->adres}}</textarea>
                        </div>



                        <div class="dropdown-divider"></div>
                        <h5>Sosyal Medya Adresleri</h5>
                          <small>Görünmesini istemediğiniz hesapların adreslerini boş bırakınız.</small>
                <div class="row">
                  <div class="col-md-3">
                        <div class="form-group">
                          <label class="font-weight-bolder">Facebook:</label>
                          <input type="text" name="facebook" class="form-control" value="{{$config->facebook}}" ></input>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="font-weight-bolder">Instagram:</label>
                          <input type="text" name="instagram" class="form-control" value="{{$config->instagram}}" ></input>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="font-weight-bolder">Twitter:</label>
                          <input type="text" name="twitter" class="form-control" value="{{$config->twitter}}" ></input>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="font-weight-bolder">Github:</label>
                          <input type="text" name="github" class="form-control" value="{{$config->github}}" ></input>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                          <div class="form-group">
                            <label class="font-weight-bolder">Linkedin:</label>
                            <input type="text" name="linkedin" class="form-control" value="{{$config->linkedin}}" ></input>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label class="font-weight-bolder">Youtube:</label>
                            <input type="text" name="youtube" class="form-control" value="{{$config->youtube}}" ></input>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label class="font-weight-bolder">Whatsapp:</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{$config->whatsapp}}" ></input>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label class="font-weight-bolder">Diğer:</label>
                            <input type="text" name="other" class="form-control" value="{{$config->other}}" ></input>
                          </div>
                      </div>
                    </div>


                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-lg btn-success">Kaydet</button>
                    </div>
              </form>
                  </div>
                </div>




@endsection
