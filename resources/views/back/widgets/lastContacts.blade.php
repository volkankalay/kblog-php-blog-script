<div class="col-md-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardContact" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Son İletişim Talepleri</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse " id="collapseCardContact">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Konu</th>
                <th>Mesaj</th>
                <th>Gönderim Tarihi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($contacts as $contact)
              <tr>
                <td>{{$contact->topic}}</td>
                <td><textarea class="form-control" rows="4" cols="50" disabled> {{$contact->message}}</textarea></td>
                <td>{{$contact->created_at->diffForHumans()}}</td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer text-center">
        <a href="{{route('admin.contact.index')}}" class="btn btn-primary btn-sm">Tümünü Görüntüle</a>
      </div>
    </div>
  </div>
</div>
