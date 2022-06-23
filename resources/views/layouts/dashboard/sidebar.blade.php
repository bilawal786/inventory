<!-- Main Sidebar Container -->

@php
      $app=App\Apperance::first();

    @endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
      <img src="{{asset($app->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $app->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(!empty(Auth::user()->image))
          <img src="{{asset(Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('index')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>
                Leads
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route ('lead.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('lead.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-product-hunt"></i>
                    <p>
                        Products
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('categories.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Product</p>
                        </a>
                    </li>
                </ul>
            </li>
          <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Purchase
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('purchase.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Purchase List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('purchase.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Purchase</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-people-arrows"></i>
                    <p>
                        Suppliers
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('supplier.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Suppliers List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('supplier.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Supplier</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                    <p>
                        Customers
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.customer.index')}}" class="nav-link">
                            <i class=" far fa-circle nav-icon"></i>
                            <p>Customers List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.customer.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Customer</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                    <p>
                        Sales
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.sales.index')}}" class="nav-link">
                            <i class=" far fa-circle nav-icon"></i>
                            <p>Sales list</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.sales.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Sales</p>
                        </a>
                    </li>
                    <li class="nav-item">
                <a href="{{route('invoice.index')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>

                </ul>



            </li>
          <li class="nav-header">Setting</li>
            <li class="nav-item">
            <a href="{{route('profile')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Update Profile
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('change.password')}}" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{route('apperance')}}" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Apperance
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                         class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
