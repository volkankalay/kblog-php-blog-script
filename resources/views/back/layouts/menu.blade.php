<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">

        <div class="sidebar-brand-text mx-3">{{$config->title}}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if(Request::segment(2)=='panel') active @endif">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Genel Bakış</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        İçerik
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2)=='yazilar') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-fw fa-edit"></i>
          <span>Yazılar</span>
        </a>
        <div id="collapseTwo" class="collapse @if(Request::segment(2)=='yazilar') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">İşlemler:</h6>
            <a class="collapse-item @if(Request::segment(2)=='yazilar' && !Request::segment(3)) active @endif" href="{{route('admin.yazilar.index')}}">Tüm Yazılar</a>
            <a class="collapse-item @if(Request::segment(2)=='yazilar' && Request::segment(3)=='olustur') active @endif" href="{{route('admin.yazilar.create')}}">Yeni Yazı Ekle</a>
</div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item @if(Request::segment(2)=='kategoriler') active @endif)">
        <a class="nav-link " href="{{route('admin.category.index')}}">
          <i class="fas fa-fw fa-folder-open"></i>
          <span>Kategoriler</span>
        </a>
      </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
                  <!-- Heading -->
                    <div class="sidebar-heading">
                      Etkileşim
                    </div>
                  <!-- Nav Item - Utilities Collapse Menu -->
                  <li class="nav-item @if(Request::segment(2)=='xxxx') active @endif)" hidden>
                    <a class="nav-link " href="#">
                      <i class="fas fa-fw fa-comment"></i>
                      <span>Yazı Yorumları</span>
                    </a>
                  </li>
                  <!-- Nav Item - Utilities Collapse Menu -->
                  <li class="nav-item @if(Request::segment(2)=='iletisim') active @endif)">
                    <a class="nav-link " href="{{route('admin.contact.index')}}">
                      <i class="far fa-fw fa-envelope"></i>
                      <span>İletişim Formları</span>
                    </a>
                  </li>
                  <!-- Nav Item - Utilities Collapse Menu -->
                  <li class="nav-item @if(Request::segment(2)=='yorumlar') active @endif)">
                    <a class="nav-link " href="{{route('admin.comment.index')}}">
                      <i class="far fa-fw fa-comments"></i>
                      <span>Yorumlar</span>
                    </a>
                  </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

      <!-- Heading -->
        <div class="sidebar-heading">
          Sayfa Ayarları
        </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link  @if(Request::segment(2)=='sayfalar') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseTwoTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-fw fa-bars"></i>
                <span>Bilgi Sayfaları</span>
              </a>
              <div id="collapseTwoTwo" class="collapse @if(Request::segment(2)=='sayfalar') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">İşlemler:</h6>
                  <a class="collapse-item @if(Request::segment(2)=='sayfalar' && !Request::segment(3)) active @endif" href="{{route('admin.page.index')}}">Tüm Sayfalar</a>
                  <a class="collapse-item @if(Request::segment(2)=='sayfalar' && Request::segment(3)=='olustur') active @endif" href="{{route('admin.page.create')}}">Yeni Sayfa Ekle</a>
                </div>
              </div>
            </li>

            <li class="nav-item @if(Request::segment(2)=='ayarlar') active @endif)">
              <a class="nav-link " href="{{route('admin.ayarlar.index')}}">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Sayfa Ayarları</span>
              </a>
            </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

      @include('back.widgets.notifycation')

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 font-weight-bolder">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('back/').'/img/user.svg'}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('admin.profile')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış Yap
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                          <!-- Page Heading -->
                          <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-3">
                            <h1 class="h3 mb-0 text-primary">@yield('title','Admin Paneli')</h1>

                            <a href="{{route('Homepage')}}" target="_blank" class="btn  btn-primary btn-icon-split btn-sm  shadow">
                              <span class="icon text-white-50">
                                <i class="fas fa-globe fa-sm text-white-50"></i>
                              </span>
                              <span class="text">Siteyi Görüntüle</span>
                            </a>
                          </div>

                          <!-- Content Row -->
                          <div class="row">
