
</div>
</div>

<hr>
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            @if($config->facebook)
            <li class="list-inline-item">
              <a href="{{$config->facebook}}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            @endif
            @if($config->twitter)
            <li class="list-inline-item">
              <a href="{{$config->twitter}}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            @endif
            @if($config->instagram)
            <li class="list-inline-item">
              <a href="{{$config->instagram}}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            @endif
            @if($config->github)
            <li class="list-inline-item">
              <a href="{{$config->github}}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            @endif
            @if($config->linkedin)
            <li class="list-inline-item">
              <a href="{{$config->linkedin}}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            @endif
            @if($config->youtube)
            <li class="list-inline-item">
              <a href="{{$config->youtube}}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            @endif
            @if($config->whatsapp)
            <li class="list-inline-item">
              <a href="{{$config->whatsapp}}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            @endif
            @if($config->other)
            <li class="list-inline-item">
              <a href="{{$config->other}}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fa fa-heart-o fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            @endif
          </ul>
          <p class="copyright text-muted">Copyright &copy; vooky 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('front/')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('front/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/49b41ce5ec.js" crossorigin="anonymous"></script>
  <!-- Custom scripts for this template -->
  <script src="{{asset('front/')}}/js/clean-blog.min.js"></script>
@yield('js')
</body>

</html>
