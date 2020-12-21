<div class="card shadow col-md-6 mx-auto text-center p-4 my-4">

    <span class="font-weight-lighter font-italic">
      Şurada Paylaş:
    </span>
<hr>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">
          <li class="list-inline-item">
            <a href="https://www.facebook.com/share.php?u={{url()->current()}}" target="_blank">
              <span class="fa-stack fa-lg">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://twitter.com/intent/tweet?text={{$article->title}}%20{{url()->current()}}" target="_blank" data-size="large">
              <span class="fa-stack fa-lg">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="whatsapp://send?text={{$article->title}} -> {{url()->current()}}">
              <span class="fa-stack fa-lg">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://telegram.me/share/url?url={{url()->current()}}&text={{$article->title}}" target="_blank">
              <span class="fa-stack fa-lg">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-telegram fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>



</div>
