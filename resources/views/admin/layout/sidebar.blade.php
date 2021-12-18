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
    <!-- Notifications Dropdown Menu -->
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
    <img src="/logo/logo.png" alt="Drop My Bag Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
        <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
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
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin.home') }}" class="nav-link">
            <i class="nav-icon fas fa-tv"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-header">Manage Product</li>
        <li class="nav-item">
          <a href="{{ route('admin.category.index') }}" class="nav-link {{Request::is('admin/category*') ? 'active': ''}}">
            <i class="nav-icon fas fa-bars"></i>
            <p>
              Category
              <span class="badge badge-danger right">
                {{AdminSidebarHelper::CATEGORY_COUNT()}}
              </span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.sub-category.index') }}" class="nav-link {{Request::is('admin/sub-category*') ? 'active': ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Sub Category
              <span class="badge badge-danger right">
                {{AdminSidebarHelper::SUB_CATEGORY_COUNT()}}
              </span>
            </p>
          </a>
        </li>

        <li class="nav-item {{Request::is('admin/product*') ? 'menu-open': ''}}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-box"></i>
            <p>
              Product
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.product.approved') }}" class="nav-link {{Request::is('admin/product/approved*') ? 'active': ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Approved
                  <span class="badge badge-danger right">
                    {{AdminSidebarHelper::PRODUCT_COUNT('2')}}
                  </span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.product.pending') }}" class="nav-link {{Request::is('admin/product/pending*') ? 'active': ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pending
                  <span class="badge badge-danger right">
                    {{AdminSidebarHelper::PRODUCT_COUNT('1')}}
                  </span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.product.disapproved') }}" class="nav-link {{Request::is('admin/product/disapproved*') ? 'active': ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Disapproved
                  <span class="badge badge-danger right">
                    {{AdminSidebarHelper::PRODUCT_COUNT('3')}}
                  </span>
                </p>
              </a>
            </li>
          </ul>
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


        <li class="nav-header">Merchants</li>
        <!-- <li class="nav-item">
          <a href="{{ route('admin.merchant.pending') }}" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>
              Pending
              <span class="badge badge-danger right">
                {{AdminSidebarHelper::CUSTOMER_COUNT()}}
              </span>
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="{{ route('admin.merchant.approved') }}" class="nav-link">
            <i class="fas fa-user-tie nav-icon"></i>
            <p>
              Active Merchants
              <span class="badge badge-danger right">
                {{AdminSidebarHelper::CUSTOMER_COUNT()}}
              </span>
            </p>
          </a>
        </li>

        <li class="nav-header">Customers</li>
        <li class="nav-item">
          <a href="{{ route('admin.customer.index') }}" class="nav-link {{Request::is('admin/customer*') ? 'active': ''}}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Active Customers
              <span class="badge badge-danger right">
                {{AdminSidebarHelper::CUSTOMER_COUNT()}}
              </span>
            </p>
          </a>
        </li>
        

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