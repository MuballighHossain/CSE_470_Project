@extends('layouts.app')
@section('content')
<div class="container-fluid prodbg">
    <div class="container pt-5">
        <ul class="nav md-pills nav-justified pills-info">
            <li class="nav-item">
                <a class="nav-link mytab z-depth-0 text-uppercase {{ Route::currentRouteNamed('prodcts') ? 'active' : '' }}"
                    href="{{route('prodcts')}}">All Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mytab z-depth-0 text-uppercase {{ Route::currentRouteNamed('naturalBeauty') ? 'active' : '' }}"
                    href="{{route('naturalBeauty')}}">Natural
                    Beauty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mytab z-depth-0 text-uppercase {{ Route::currentRouteNamed('healthyNutrition') ? 'active' : '' }}"
                    href="{{route('healthyNutrition')}}">Healthy
                    Nutrition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  mytab z-depth-0 text-uppercase {{ Route::currentRouteNamed('foodSuppliments') ? 'active' : '' }}"
                    href="{{route('foodSuppliments')}}">Food
                    Suppliments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mytab z-depth-0 text-uppercase {{ Route::currentRouteNamed('accesories') ? 'active' : '' }}"
                    href="{{route('accesories')}}">Accesories</a>
            </li>
        </ul>
        @if(Route::current()->getName() == 'prodcts')
        <h2 class="card-title h1-responsive pt-3 mb-2 font-bold"><strong>All Porduct</strong></h2>
        <p class="mb-5">Explore all the quality products of Savvy remedies</p>
        @elseif(Route::current()->getName() == 'naturalBeauty')
        <div>
            <h2 class="card-title h1-responsive pt-3 mb-2 font-bold"><strong>Natural Beauty</strong></h2>
            <p class="mb-5">To keep our skin healthy, we need to keep up good beauty routines, stay
                consistent and make sure we
                give our bodies nothing but the best. </p>
        </div>
        @elseif(Route::current()->getName() == 'healthyNutrition')
        <div>
            <h2 class="card-title h1-responsive pt-3 mb-2 font-bold"><strong>Healthy Nutrition</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum nostrum ex tempore.</p>
        </div>
        @elseif(Route::current()->getName() == 'foodSuppliments')
        <div>
            <h2 class="card-title h1-responsive pt-3 mb-2 font-bold"><strong>Food Suppliments</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum nostrum ex tempore.</p>
        </div>
        @elseif(Route::current()->getName() == 'accesories')
        <div>
            <h2 class="card-title h1-responsive pt-3 mb-2 font-bold"><strong>Accesories</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum nostrum ex tempore.</p>
        </div>
        @endif


        <hr>
        <div class="row">
            <div class="col-lg-12 pt-4">
                {{-- <div class="col-md-4">
                    <select class="mdb-select md-form">

                        <option value="" disabled selected>Choose Category</option>

                        <option value="1">Natural Beauty</option>

                        <option value="2">Healthy Nutrition</option>

                        <option value="3">Food Suppliments</option>

                        <option value="4">Accesories</option>

                    </select>
                </div> --}}
                <div class="row mb-5">
                    @if (count($products)>0)
                    @foreach ($products as $product)
                    <div class="col-md-3" data-aos="fade-up">
                        <div class="card card-ecommerce mb-2">

                            <!-- Card image -->
                            <div class="view overlay p-4">

                                <img src="/storage/uploads/{{$product->image}}" class="img-fluid" alt="">

                                <a>

                                    <div class="mask rgba-white-slight"></div>

                                </a>

                            </div>
                            <!-- Card image -->

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Category & Title -->
                                <h5 class="card-title mb-1"><a href="" class="dark-grey-text">{{$product->name}}</a>
                                    {{-- <span
                                        class="float-right"><strong>£{{number_format($product->price,2)}}</strong></span>
                                    --}}
                                </h5>


                                <!-- Rating -->
                                <!-- Card footer -->
                                <div class="card-footer pb-0">
                                    <div class="row mb-0">
                                        <a class="btn btn-sm btn-info z-depth-0 w-100 white-text" type="button"
                                            role="button" href="{{route('shop', $product->id)}}">See product</a>
                                    </div>

                                </div>

                            </div>
                            <!-- Card content -->

                        </div>
                    </div>

                    @endforeach
                    @else
                    <div class="alert alert-danger w-100 text-center" role="alert">
                        No products available!
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    jarallax(document.querySelectorAll('.jarallax'), {
    speed: 0.2
});
</script>
@endsection