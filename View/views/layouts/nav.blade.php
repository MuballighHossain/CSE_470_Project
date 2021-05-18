{{-- <div class="d-none d-lg-block d-xl-block" style="background-color: #F2F3F7; font-size: 13px;">
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="{{route('privacy')}}" style="color:black;">Privacy policy</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{route('terms')}}" style="color:black;">Terms & Conditions</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{route('cookies')}}" style="color:black;">Cookies Policy</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{route('about')}}" style="color:black;">About Us</a>
</li>
</ul>
</div> --}}
<nav class="navbar navbar-expand-lg sticky-top mb-0 pb-0 navbar-light d-none d-lg-flex">
  <div class="container">
    <a class="navbar-brand py-0 " href="{{route('home')}}"><img style="width: 6rem;" src="/img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between w-100 mb-0 pb-0" id="navbarNav">
      <ul class="navbar-nav ml-auto pt-0">
        <li class="nav-item pt-3 navhov {{ Route::currentRouteNamed('home') ? 'navtive' : '' }}">
          <a class="nav-link pb-5 text-center" href="{{route('home')}}" style="width: 6rem;">HOME</a>
        </li>
        <li class="nav-item pt-3 navhov {{ Route::currentRouteNamed('about') ? 'navtive' : '' }}">
          <a class="nav-link pb-5 text-center" href="{{route('about')}}" style="width: 6rem;">ABOUT US</a>
        </li>
        <li
          class="nav-item navhov pt-4 dropdown mega-dropdown {{ Route::currentRouteNamed('prodcts') ? 'navtive' : '' }}">
          <a class="nav-link pb-5 text-center d-inline text-uppercase" href="{{route('prodcts')}}"
            style="width: 6rem;">Products</a>
          <a class="nav-link pb-5 pl-0 d-inline dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">

          </a>

          <?php
        $products =DB::table('products')->get();
        ?>
          <div class="dropdown-menu ml-auto mega-menu v-1 z-depth-0 megabg py-3 px-3"
            aria-labelledby="navbarDropdownMenuLink2">
            <div class="row">
              <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase mt-0 font-weight-bold">Natural Beauty</h6>
                <ul class="list-unstyled">
                  @foreach ($products as $product)
                  <li>
                    @if ($product->cat == 1)
                    <a class="menu-item pl-0" href="{{route('shop', $product->slug)}}">
                      <i class="fas fa-caret-right pl-1 pr-3"></i>{{$product->name}}
                    </a>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold">Healthy Neutrition</h6>
                <ul class="list-unstyled">
                  @foreach ($products as $product)
                  <li>
                    @if ($product->cat == 2)
                    <a class="menu-item pl-0" href="{{route('shop', $product->slug)}}">
                      <i class="fas fa-caret-right pl-1 pr-3"></i>{{$product->name}}
                    </a>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold">Food Suppliments</h6>
                <ul class="list-unstyled">
                  @foreach ($products as $product)
                  <li>
                    @if ($product->cat == 3)
                    <a class="menu-item pl-0" href="{{route('shop', $product->slug)}}">
                      <i class="fas fa-caret-right pl-1 pr-3"></i>{{$product->name}}
                    </a>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold">Accesories</h6>
                <ul class="list-unstyled">
                  @foreach ($products as $product)
                  <li>
                    @if ($product->cat == 4)
                    <a class="menu-item pl-0" href="{{route('shop', $product->slug)}}">
                      <i class="fas fa-caret-right pl-1 pr-3"></i>{{$product->name}}
                    </a>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item pt-3 navhov {{ Route::currentRouteNamed('wholesale') ? 'navtive' : '' }}">
          <a class="nav-link pb-5 text-center" href="{{route('wholesale')}}" style="width: 6rem;">WHOLESALE</a>
        </li>
        <li class="nav-item  pt-3 navhov  {{ Route::currentRouteNamed('lifestyle') ? 'navtive' : '' }}">
          <a class="nav-link pb-5 text-center" href="{{route('lifestyle')}}" style="width: 6rem;">BLOG</a>
        </li>
        <li class="nav-item  pt-3 navhov  {{ Route::currentRouteNamed('organicLiving') ? 'navtive' : '' }}">
          <a class="nav-link pb-5 text-center" href="{{route('organicLiving')}}" style="width: 14rem;">NATURAL & ORGANIC
            LIVING</a>
        </li>
        <li class="nav-item pt-3 navhov {{ Route::currentRouteNamed('contact') ? 'navtive' : '' }}">
          <a class="nav-link pb-5 text-center" href="{{route('contact')}}" style="width: 6rem;">CONTACT</a>
        </li>
        {{-- </ul>


    <a class="navbar-brand mx-auto d-none d-lg-flex p-0 m-0" href="{{route('home')}}"><img style="width: 6rem;"
          src="/img/logo.png"></a>


        <ul class="navbar-nav ml-auto"> --}}
          <li class="nav-item pt-3 pl-3">
            <a class="nav-link pb-5 searchbtn" href="#searchBar" data-target="#searchBar" data-toggle="collapse"><i
                class="fa fa-search" aria-hidden="true"></i></a>
            {{-- <form class="form-inline d-flex md-form form-sm active-cyan-4 mt-0 mb-0" action="{{route('search')}}">
            <input class="form-control w-95" type="text" name="query" id="query" placeholder="Search Product"
              value="{{request()->input('query')}}" aria-label="Search">
            <button type="submit" class="from-control btn btn-info btn-sm srchbtn"><i class="fa fa-search"
                aria-hidden="true"></i></button>
            </form> --}}
          </li>
          <li class="nav-item pt-3">
            <a class="nav-link pb-5" href="{{url('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true">
                @if (Cart::getTotalQuantity()>0)
                <span class="badge badge-info ml-1 z-depth-0">{{Cart::getTotalQuantity()}}</span>
                @endif
              </i></a>
          </li>
          <li class="nav-item pt-3 dropdown ">
            <a class="nav-link pb-5 dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-info mt-0" style="border-style: none;"
              aria-labelledby="navbarDropdownMenuLink-333">
              <!-- Authentication Links -->
              @guest
              <a class="dropdown-item z-depth-0" href="{{ route('login')}}">{{ __('Login') }}</a>
              @if (Route::has('register'))
              <a class="dropdown-item z-depth-0" href="{{ route('register')}}">{{ __('Register') }}</a>
              @endif
              @else
              <a id="navbarDropdown" class="dropdown-item z-depth-0" href="#" v-pre>
                {{ Auth::user()->name }}
              </a>

              <a class="dropdown-item z-depth-0" href="{{ route('user.logout')}}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
    </div>
  </div>
</nav>
<div class="collapse fade fixed-top" id="searchBar" style="background-color: #F2F3F7; margin-top:106px;"
  aria-hidden="true">
  <form class="form-inline d-flex md-form justify-content-center active-cyan-4 mt-0 mb-0"
    action="{{route('Prodsearch')}}">
    <input class="form-control" type="text" style="width: 50%;" name="query" id="query" placeholder="Search Product"
      value="{{request()->input('query')}}" aria-label="Search">
    <button type="submit" class="from-control btn btn-info btn-sm srchbtn"><i class="fa fa-search"
        aria-hidden="true"></i></button>
  </form>
</div>

<!--MOBILE NAV-->
<nav class="navbar navbar-expand-lg sticky-top mb-0 pb-0 navbar-light d-lg-none">

  <!-- Navbar brand -->
  <a class="navbar-brand2" href="{{route('home')}}"><img style="width: 7rem;" src="/img/logo.png"></a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <form class="form-inline d-flex md-form form-sm active-cyan-4 mt-0 mb-0" action="{{route('search')}}">
          <input class="form-control w-95" type="text" name="query" id="query" placeholder="Search Product"
            value="{{request()->input('query')}}" aria-label="Search">
          <button type="submit" class="from-control btn btn-info btn-sm srchbtn"><i class="fa fa-search"
              aria-hidden="true"></i></button>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">HOME
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('about')}}">ABOUT US
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('prodcts')}}">PRODUCTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('wholesale')}}">WHOLESALE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('lifestyle')}}">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('organicLiving')}}">NATURAL & ORGANIC
          LIVING</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('contact')}}">CONTACT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true">
            @if (Cart::getTotalQuantity()>0)
            <span class="badge badge-info ml-1 z-depth-0">{{Cart::getTotalQuantity()}}</span>
            @endif
          </i> Cart</a>
      </li>
      <li class="nav-item">
        <div class="  ">
          <!-- Authentication Links -->
          @guest
          <a class="nav-link z-depth-0" href="{{ route('login')}}"><i class="fas fa-user"></i> Login</a>
          @if (Route::has('register'))
          <a class="nav-link z-depth-0" href="{{ route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>
            Register</a>
          @endif
          @else
          <a class="nav-link z-depth-0" href="#" v-pre>
            {{ Auth::user()->name }}
          </a>

          <a class="nav-link z-depth-0" href="{{ route('user.logout')}}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
      @endguest
    </ul>
</nav>
<!--/.Navbar-->