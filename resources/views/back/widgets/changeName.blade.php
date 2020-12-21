<!-- Change Name Modal -->
<div class="modal fade" id="changeNameModal" tabindex="-1" role="dialog" aria-labelledby="changeNameModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kimlik Değiştir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{route('admin.change.name')}}">
          @csrf
          <input name="id" type="hidden" value="{{Auth::user()->id}}">
          <label>Yeni Kimlik</label>
          <input type="text" name="name" class="form-control" value="{{$admin->name}}" required/>

          <div class="form-group my-2">
          <label for="cb1">Kimlik değişimini onaylıyorum.</label>
          <input type="checkbox" class="" id="cb1" required>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
        <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
      </div>

      </form>
    </div>
  </div>
</div>
