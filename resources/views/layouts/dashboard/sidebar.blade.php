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
            <a href="{{route('index')}}" class="nav-link {{Route::is('index*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{Route::is('lead.index*') || Route::is('lead.create*') ? 'active' : ''}}">
               <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>
                Leads
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route ('lead.index') }}" class="nav-link {{Route::is('lead.index*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('lead.create')}}" class="nav-link {{Route::is('lead.create*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="#" class="nav-link {{Route::is('categories.index*') || Route::is('product.index*') || Route::is('product.create*') ? 'active' : ''}}">
                    <i class="nav-icon fab fa-product-hunt"></i>
                    <p>
                        Products
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('categories.index')}}" class="nav-link {{Route::is('categories.index*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link {{Route::is('product.index*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.create')}}" class="nav-link {{Route::is('product.create*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Product</p>
                        </a>
                    </li>
                </ul>
            </li>
          <li class="nav-item">
                <a href="#" class="nav-link {{Route::is('purchase.index*') || Route::is('purchase.create*')  ? 'active' : ''}}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Purchase
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('purchase.index')}}" class="nav-link {{Route::is('purchase.index*')   ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Purchase List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('purchase.create')}}" class="nav-link {{Route::is('purchase.create*')   ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Purchase</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{Route::is('supplier.index*') || Route::is('supplier.create*')  ? 'active' : ''}}">
                    <i class="nav-icon fas fa-people-arrows"></i>
                    <p>
                        Suppliers
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('supplier.index')}}" class="nav-link {{Route::is('supplier.index*')   ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Suppliers List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('supplier.create')}}" class="nav-link {{Route::is('supplier.create*')   ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Supplier</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{Route::is('customer.index*') || Route::is('customer.create*')  ? 'active' : ''}}">
                <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                    <p>
                        Customers
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('customer.index')}}" class="nav-link {{Route::is('customer.index*')  ? 'active' : ''}}">
                            <i class=" far fa-circle nav-icon"></i>
                            <p>Customers List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('customer.create')}}" class="nav-link {{Route::is('customer.create*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Customer</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{Route::is('sales.index*') || Route::is('sales.create*')  ? 'active' : ''}}">
                <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                    <p>
                        Sales
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('sales.index')}}" class="nav-link {{Route::is('sales.index*')  ? 'active' : ''}}">
                            <i class=" far fa-circle nav-icon"></i>
                            <p>Sales list</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('sales.create')}}" class="nav-link {{Route::is('sales.create*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Sales</p>
                        </a>
                    </li>
                </ul>
            <li class="nav-item">
                <a href="#" class="nav-link {{Route::is('expence.category*') || Route::is('expence.create*') || Route::is('expence.index*')  ? 'active' : ''}}">
                    <i class="nav-icon fa fa-cash-register" aria-hidden="true"></i>
                    <p>
                        Expences
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('expence.category')}}" class="nav-link {{Route::is('expence.category*')  ? 'active' : ''}}">
                            <i class=" far fa-circle nav-icon"></i>
                            <p>Expence Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('expence.create')}}" class="nav-link {{Route::is('expence.create*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Expence</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('expence.index')}}" class="nav-link {{Route::is('expence.index*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Expence lists</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link {{Route::is('income.category*') || Route::is('income.create*') || Route::is('income.index*')  ? 'active' : ''}}">
                    <i class="nav-icon fa fa-money-bill" aria-hidden="true"></i>
                    <p>
                        Incomes
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('income.category')}}" class="nav-link {{Route::is('income.category*')  ? 'active' : ''}}">
                            <i class=" far fa-circle nav-icon"></i>
                            <p>Income Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('income.create')}}" class="nav-link {{Route::is('income.create*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add income</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('income.index')}}" class="nav-link {{Route::is('income.index*')  ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Income lists</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link {{Route::is('report.index*')   ? 'active' : ''}}">
                    <i class="nav-icon fa fa-money-bill" aria-hidden="true"></i>
                    <p>
                        Report
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('report.index')}}" class="nav-link {{Route::is('report.index*')   ? 'active' : ''}}">
                            <i class=" far fa-circle nav-icon"></i>
                            <p>Income/expence</p>
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
