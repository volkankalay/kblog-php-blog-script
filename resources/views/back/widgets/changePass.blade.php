<!-- Change Name Modal -->
<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="changePassModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Şifre Değiştir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{route('admin.change.pass')}}">
          @csrf
          <input name="id" type="hidden" value="{{Auth::user()->id}}">

          <label>Eski Şifre</label>
          <input type="password" name="oldpass" class="form-control" placeholder="*******" required/>

          <label>Yeni Şifre</label>
          <input type="password" name="pass" class="form-control" placeholder="*******" required/>

          <label>Yeni Şifre(Tekrar)</label>
          <input type="password" name="pass_confirmation" class="form-control" placeholder="*******" required/>

          <div class="form-group my-2">
          <label for="cb3">Şifre değişimini onaylıyorum.</label>
          <input type="checkbox" class="" id="cb3" required>
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
