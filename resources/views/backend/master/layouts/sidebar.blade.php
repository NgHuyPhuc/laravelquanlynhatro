<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          <div class="badge badge-danger">new</div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-nha-tro" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-document-text menu-icon"></i>
          <span class="menu-title">Quản lý nhà trọ</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-nha-tro">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="./nhatro.html">Nhà trọ 27/9/34</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('nhatro.create')}}">
                      <i class="menu-arrow mr-2"></i> Thêm mới nhà trọ</a>
              </li>
          </ul>
      </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">Error pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://bootstrapdash.com/demo/polluxui-free/docs/documentation.html">
          <i class="typcn typcn-mortar-board menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>