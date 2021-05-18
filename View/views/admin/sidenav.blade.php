<!-- SideNav slide-out button -->
<a href="#" data-activates="slide-out" class="btn btn-info p-3 button-collapse"><i class="fas fa-bars"></i></a>

<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed unique-color-dark">
  <ul class="custom-scrollbar">
    <!-- Logo -->
    <li>
      <div class="logo-wrapper waves-light" style="height:12em;">
        <a href="{{route('index')}}"><img src="/img/logo2.png" class="img-fluid flex-center"></a>
      </div>
    </li>
    <!--/. Logo -->
    <!-- Side navigation links -->
    <li>
      <ul class="collapsible collapsible-accordion">
        <li><a class="collapsible-header waves-effect arrow-r {{ Route::currentRouteNamed('create') ? 'active' : '' }} {{ Route::currentRouteNamed('product.index') ? 'active' : '' }} "><i
              class="fas fa-wine-bottle"></i> Products<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li class="{{ Route::currentRouteNamed('create') ? 'active2' : '' }}"><a href="{{route('create')}}"
                  class="waves-effect">New Product</a>
              </li>
              <li class="{{ Route::currentRouteNamed('product.index') ? 'active2' : '' }}"><a
                  href="{{route('product.index')}}" class="waves-effect">Product List</a>
              </li>
            </ul>
          </div>
        </li>
        <li><a
            class="collapsible-header waves-effect arrow-r {{ Route::currentRouteNamed('order.index') ? 'active' : '' }} {{ Route::currentRouteNamed('order.complete') ? 'active' : '' }}
          {{ Route::currentRouteNamed('region.create') ? 'active' : '' }} {{ Route::currentRouteNamed('region.index') ? 'active' : '' }}"><i
              class="fas fa-shopping-cart"></i>
            Orders<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li class="{{ Route::currentRouteNamed('order.index') ? 'active2' : '' }}"><a
                  href="{{route('order.index')}}" class="waves-effect">Order Lists</a>
              </li>
              <li class="{{ Route::currentRouteNamed('order.complete') ? 'active2' : '' }}"><a href="{{route('order.complete')}}"
                  class="waves-effect">Completed Orders</a>
              </li>
              <li class="{{ Route::currentRouteNamed('region.create') ? 'active2' : '' }}"><a
                  href="{{route('region.create')}}" class="waves-effect">Add Region</a>
              </li>
              <li class="{{ Route::currentRouteNamed('region.index') ? 'active2' : '' }}"><a
                  href="{{route('region.index')}}" class="waves-effect">Shipping Region Lists</a>
              </li>
            </ul>
          </div>
        </li>

        {{-- <li><a class="collapsible-header waves-effect arrow-r {{ Route::currentRouteNamed('addregion') ? 'active' : '' }}
        {{ Route::currentRouteNamed('region') ? 'active' : '' }}"><i class="fas fa-shopping-cart"></i>
        Shipping/Region<i class="fas fa-angle-down rotate-icon"></i></a>
        <div class="collapsible-body">
          <ul>
            <li class="{{ Route::currentRouteNamed('addregion') ? 'active2' : '' }}"><a href="{{route('addregion')}}"
                class="waves-effect">Add Region</a>
            </li>
            <li class="{{ Route::currentRouteNamed('region') ? 'active2' : '' }}"><a href="{{route('region')}}"
                class="waves-effect">Shipping Region Lists</a>
            </li>
          </ul>
        </div>
    </li> --}}

    <li><a class="collapsible-header waves-effect arrow-r {{ Route::currentRouteNamed('blogs.create') ? 'active' : '' }} {{ Route::currentRouteNamed('blogs.index') ? 'active' : '' }}"><i
          class="far fa-smile-beam"></i>Lifestyle<i class="fas fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul>
          <li class="{{ Route::currentRouteNamed('blogs.create') ? 'active2' : '' }}"><a
              href="{{route('blogs.create')}}" class="waves-effect">write Blog</a>
          </li>
          <li class="{{ Route::currentRouteNamed('blogs.index') ? 'active2' : '' }}"><a href="{{route('blogs.index')}}"
              class="waves-effect">blog List</a>
          </li>
        </ul>
      </div>
    </li>
    <li><a class="collapsible-header waves-effect arrow-r {{ Route::currentRouteNamed('admin.users') ? 'active' : '' }}
      {{ Route::currentRouteNamed('admin.monitor') ? 'active' : '' }}
      {{ Route::currentRouteNamed('user.msg') ? 'active' : '' }}"><i class="fas fa-users"></i>Users<i
          class="fas fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul>
          <li class="{{ Route::currentRouteNamed('admin.users') ? 'active2' : '' }}"><a href="{{route('admin.users')}}" class="waves-effect">User list</a>
          </li>
          <li class="{{ Route::currentRouteNamed('user.msg') ? 'active2' : '' }}"><a href="{{route('user.msg')}}" class="waves-effect">User Messages</a>
          </li>
          <?php
          $products =DB::table('products')->get();
          ?>
          @foreach ($products as $product)
          <li class="{{ (request()->segment(3) == $product->id) ? 'active2' : '' }}"><a href="{{route('admin.monitor',$product->id)}}" class="waves-effect">Monitor: {{$product->name}}</a>
           @endforeach
          </li>
        </ul>
      </div>
    </li>
    <li><a class="collapsible-header waves-effect arrow-r {{ Route::currentRouteNamed('admin.landing') ? 'active' : '' }}"><i class="fas fa-cog"></i>Settingss<i
          class="fas fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul>
          <li class="{{ Route::currentRouteNamed('admin.landing') ? 'active2' : '' }}"><a href="{{route('admin.landing')}}" class="waves-effect">Landing page</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="">
      <a class="collapsible-header waves-effect arrow-r">
        <i class="fas fa-user"></i>My Account <i class="fas fa-angle-down rotate-icon"></i>
      </a>
      <div class="collapsible-body">
        <!-- Authentication Links -->
        <ul>
        @guest
        <li>
        
        @if (Route::has('register'))
        
        @endif
        @else
        <li>
        <a id="navbarDropdown" class="waves-effect" href="#" v-pre>
          {{ Auth::user()->name }}
        </a>
        </li>
        <li>
        <a class="waves-effect" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
          @csrf
        </form>
      </li>
      </ul>
      </div>
    </li>
    @endguest


  </ul>
  </li>
  <!--/. Side navigation links -->
  </ul>
  <div class="sidenav unique-color-dark"></div>
</div>
<!--/. Sidebar navigation -->

<script>
  $(document).ready(function() {
  // SideNav Button Initialization
  $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(sideNavScrollbar);
});
</script>