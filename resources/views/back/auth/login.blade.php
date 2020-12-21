@section('title','Admin Girişi')
@include('back.layouts.header')

<body class="bg-gradient-light" style="background-image:url('{{asset('svg/')}}/login.svg');">

  <div class="container-fluid">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9 my-5">
        <div class="card o-hidden border-0 shadow-lg my-5" style="opacity:.97;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 mx-auto p-5">
                <div class="p-1">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">@yield('title')</h1>
                  </div>
                  @if($errors->any())
                      <div class="alert alert-danger my-5">
                        {{$errors->first()}}
                      </div>
                  @endif
                  <form method="post" action="{{route('admin.login.post')}}" class="user">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="E-Posta">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="******">
                    </div>
                    <div class="form-group text-right">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="rememberme">
                        <label class="custom-control-label" for="customCheck">Beni Hatırla</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Giriş
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('back/')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('back/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('back/')}}/js/sb-admin-2.min.js"></script>

</body>

<footer style="position: absolute; bottom:0;color: #9f9f9f;background-color:#f9f9f9;width:100%;height:35px;padding: 5px;text-align:center;">
Copyright &copy; vooky 2020
</footer>
</html>
