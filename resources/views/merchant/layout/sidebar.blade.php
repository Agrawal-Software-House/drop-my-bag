<!-- Preloader -->
{{-- <div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> --}}

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary bg-limebg-lime elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.home') }}" class="brand-link">
    <img src="/logo/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: white;">
    <span class="brand-text font-weight-light">Drop My Bag</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{Storage::url(Auth::guard('merchant')->user()->avtar)}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::guard('merchant')->user()->name}}</a>
        <p class="mb-0 pb-0 white-text">{{Auth::guard('merchant')->user()->firm_name}}</p>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('merchant.home') }}" class="nav-link">
            <img src="{{ asset('merchant\img\sidebar\dashboard.png') }}" alt="">
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-header">Manage Product</li>
        <li class="nav-item">
          <a href="{{ route('merchant.product.create') }}" class="nav-link {{Request::is('merchant/product/create*') ? 'active': ''}}">
            <img src="{{ asset('merchant\img\sidebar\addProduct.png') }}" alt="">
            <p>
              Add new
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('merchant.product.approved') }}" class="nav-link {{Request::is('merchant/product/approved*') ? 'active': ''}}">
            <img src="{{ asset('merchant\img\sidebar\approve.png') }}" alt="">
            <p>
              Approved
              <span class="badge badge-success right">2</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('merchant.product.pending') }}" class="nav-link {{Request::is('merchant/product/pending*') ? 'active': ''}}">
            <img src="{{ asset('merchant\img\sidebar\pending.png') }}" alt="">
            <p>
              Pending
              <span class="badge badge-danger right">2</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('merchant.product.disapproved') }}" class="nav-link {{Request::is('merchant/product/disapproved*') ? 'active': ''}}">
            <img src="{{ asset('merchant\img\sidebar\disapprove.png') }}" alt="">
            <p>
              Disapproved
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>

        <!-- <li class="nav-header">Manange Orders</li>
        <li class="nav-item">
          <a href="iframe.html" class="nav-link">
            <i class="nav-icon fas fa-ellipsis-h"></i>
            <p>Pending</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://adminlte.io/docs/3.1/" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Delivered</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://adminlte.io/docs/3.1/" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Returned</p>
          </a>
        </li> -->



        <li class="nav-header">Setting</li>

        <li class="nav-item">
          <a href="{{ route('merchant.setting.my-profile') }}" class="nav-link {{Request::is('merchant/setting/my-profile*') ? 'active': ''}}">
            <img src="{{ asset('merchant\img\sidebar\profile.png') }}" alt="">
            <p>
              My Profile
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('merchant.setting.password') }}" class="nav-link {{Request::is('merchant/setting/change-password*') ? 'active': ''}}">
            <img src="{{ asset('merchant\img\sidebar\password.png') }}" alt="">
            <p>
              Change Password
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">

              <form id="logout-form" action="{{ route('merchant.logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>

            <img src="{{ asset('merchant\img\sidebar\logout.png') }}" alt="">
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>