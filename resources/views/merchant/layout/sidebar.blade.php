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
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('admin.home') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
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
        <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::guard('merchant')->user()->name}}</a>
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
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Dashboard
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>

        <li class="nav-header">Manage Product</li>
        <li class="nav-item">
          <a href="{{ route('merchant.product.create') }}" class="nav-link">
            <i class="nav-icon fas fa-plus"></i>
            <p>
              Add new
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('merchant.product.approved') }}" class="nav-link">
            <i class="nav-icon fas fa-check"></i>
            <p>
              Approved
              <span class="badge badge-success right">2</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('merchant.product.pending') }}" class="nav-link">
            <i class="nav-icon far fa-clock"></i>
            <p>
              Pending
              <span class="badge badge-danger right">2</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('merchant.product.disapproved') }}" class="nav-link">
            <i class="fas fa-times nav-icon"></i>
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
          <a href="{{ route('admin.setting.my-profile') }}" class="nav-link {{Request::is('admin/setting/my-profile*') ? 'active': ''}}">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              My Profile
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.setting.password') }}" class="nav-link {{Request::is('admin/setting/change-password*') ? 'active': ''}}">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Change Password
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>