<!-- Change Name Modal -->
<div class="modal fade" id="changeMailModal" tabindex="-1" role="dialog" aria-labelledby="changeMailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">E-Posta Değiştir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{route('admin.change.mail')}}">
          @csrf
          <input name="id" type="hidden" value="{{Auth::user()->id}}">

          <label>Yeni E-Posta</label>
          <input type="email" name="mail" class="form-control" placeholder="{{$admin->email}}" required/>

          <label>Yeni E-Posta(Tekrar)</label>
          <input type="email" name="mail_confirmation" class="form-control" placeholder="{{$admin->email}}" required/>

          <div class="form-group my-2">
          <label for="cb2">E-Posta değişimini onaylıyorum.</label>
          <input type="checkbox" class="" id="cb2" required>
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
