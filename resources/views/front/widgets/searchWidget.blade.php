
                  <!-- Search Widget -->
      <div class="card">
        <h5 class="card-header bg-dark text-light">Arama</h5>
          <div class="card-body">
            <form action="{{route('search','tag')}}" method="post">
              @csrf
              <div class="input-group">
                <input type="text" name='tag' class="form-control" placeholder="Bir şeyler..." required>
                  <span class="input-group-append">
                  <button class="btn btn-dark" type="submit">Ara</button>
                </span>
              </div>
            </form>
          </div>
        </div>
