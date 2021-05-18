@extends('layouts.app')
@section('content')

<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    @foreach ($sliders as $slider)
    @if ($loop->iteration==1)
    <li data-target="#carousel-example-2" class="active" data-slide-to="{{$loop->iteration}}"></li>
    @else
    <li data-target="#carousel-example-2" data-slide-to="{{$loop->iteration}}"></li>
    @endif
    @endforeach
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    @foreach ($sliders as $slider)
    @if ($loop->iteration==1)
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="/storage/uploads/{{$slider->image}}" alt="First slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">{{$slider->header}}</h3>
        <p>{{$slider->caption}}</p>
      </div>
    </div>
    @else
    <div class="carousel-item">
      <div class="view">
        <img class="d-block w-100" src="/storage/uploads/{{$slider->image}}" alt="First slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">{{$slider->header}}</h3>
        <p>{{$slider->caption}}</p>
      </div>
    </div>
    @endif
    @endforeach
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<div class=" pt-4">
  @foreach ($headerdata as $header)
  <h5 class="text-center">{{$header->head}}</h5>
  @endforeach
</div>

<div class="container-fluid w-100 pt-3">
  <div class="row justify-content-center my-3">
    <div class="col-md-3 card" data-aos="fade-up">
      <div class="view overlay zoom">
        <img src="/img/natural1.jpg" class="img-fluid " alt="zoom">
        <a class="w-100 h-100" href="{{route('naturalBeauty')}}">
          <div class="mask rgba-blue-strong flex-center waves-effect waves-light">
            <h5 class="white-text text-center py-3" style="background-color:#33b5e5; width:100%;">Natural Beauty
            </h5>
          </div>
        </a>
      </div>
    </div>

    <div class="col-md-3 card" data-aos="fade-up" data-aos-delay="50">
      <div class="view overlay zoom">
        <img src="/img/healthy1.jpg" class="img-fluid" alt="zoom">
        <a class="w-100 h-100" href="{{route('healthyNutrition')}}">
          <div class="mask rgba-blue-strong flex-center waves-effect waves-light">
            <h5 class="white-text text-center py-3" style="background-color:#33b5e5; width:100%;">Healthy Nutrition</h5>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-3 card" data-aos="fade-up" data-aos-delay="100">
      <div class="view overlay zoom">
        <img src="/img/food1.jpg" class="img-fluid " alt="zoom">
        <a class="w-100 h-100" href="{{route('foodSuppliments')}}">
          <div class="mask rgba-blue-strong flex-center waves-effect waves-light">
            <h5 class="white-text text-center py-3" style="background-color:#33b5e5; width:100%;">Food Suppliments</h5>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-3 card" data-aos="fade-up" data-aos-delay="150">
      <div class="view overlay zoom">
        <img src="/img/flavor.png" class="img-fluid " alt="zoom">
        <a class="w-100 h-100" href="{{route('accesories')}}">
          <div class="mask rgba-blue-strong flex-center waves-effect waves-light">
            <h5 class="white-text text-center py-3" style="background-color:#33b5e5; width:100%;">Accesories</h5>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<div style="background-color: #F2F3F7;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 p-3" data-aos="fade-up">
        <h5 class="mb-4">{{$featureCaption[0]}}</h5>
        <img class="img-fluid" id="parallaxme" src="/storage/uploads/{{$featureProd[0]->image}}" alt="">
      </div>
      <div class="col-md-6 p-3 mt-5">
        <div class="card mycard" data-aos="flip-up">
        <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>{{$featureProd[0]->name}}</a></h4>
            <!-- Text -->
            <p class="card-text">{{$featureProd[0]->subtag}}</p>
            <!-- Button -->
            <a href="{{route('shop', $featureProd[0]->slug)}}" class="btn btn-info z-depth-0">Buy Now</a>
            <div class="float-right">
              @for ($i = 0; $i < ($featureProd[0]->rate)-0.5; $i++)
                <span class="fa fa-star checked"></span>
                @endfor
                @for ($i = 0; $i < 5-($featureProd[0]->rate); $i++)
                  <span class="far fa-star holo"></span>
                  @endfor
            </div>
          </div>
          <div class="p-3">
            <img class="img-fluid" src="img/icon.png" style="width: 50%;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="productlist container">
  <div class="row my-5">
    @if (count($products)>0)
    @foreach ($products as $product)
    @if ($loop->iteration<=4) <div class="col-md-3" data-aos="fade-up">
      <div class="card card-ecommerce mb-2 border-info">

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
              <a class="btn btn-sm btn-info z-depth-0 w-100 white-text" type="button" role="button"
                href="{{route('shop', $product->slug)}}">See product</a>
            </div>

          </div>

        </div>
        <!-- Card content -->

      </div>
  </div>
  @endif
  @endforeach
  @else
  <div class="alert alert-danger w-100 text-center" role="alert">
    No products available!
  </div>
  @endif
</div>
</div>

{{-- <div class="container-fluid" style="background-color:#F2F3F7;">
      <div class="row justify-content-center">
        <div class="col-md-3 m-3 card" data-aos="fade-up">
      <div class="card-body">
        <h4 class="text-center text-info"><i class="fa fa-globe" aria-hidden="true"></i><br>
        Worldwide Shipping </h4>
        <p class="text-center">We provide our customers with shipping options that suit their needs.<br>
        <Strong>- Within the United Kingdom</strong> <br>
    Any orders placed before 2pm shall be delivered the following day. The general fee is £4. Orders whose value exceeds £50 will be delivered for free. You shop, we drop.<br>
<strong> -Outside the United Kingdom</strong> <br>
Any order outside the United Kingdom may take from 5 to 9 working days depending on the destination. We charge a fee of £5.5 for orders to Europe and £15 for the rest of the world. <br>
Please contact us on: info@savvyremedies.com for a quote on shipping costs to your International destination. Please advise us of the products you wish to include in your order with your name, postal address and Zip Code, so we can provide an accurate quote.
</p>
        </div>
      </div>
      <div class="col-md-3 m-3 card" data-aos="fade-up" data-aos-delay="50">
      <div class="card-body">
        <h4 class="text-center text-success"><i class="fa fa-handshake" aria-hidden="true"></i><br>
        Quality </h4>
        <p class="text-center">Quality is more than simply offering a good product, in fact, our consumers trust us to continue offering them safe and high quality products. We are committed to choose products that are fairly, responsibly and ethically produced. The sourcing of our products represents a real environmental footprint to ensure a sustainable growth for us and our partners.</p>
      </div>
      </div>
      <div class="col-md-3 m-3 card" data-aos="fade-up" data-aos-delay="100">
      <div class="card-body">
        <h4 class="text-center text-danger"><i class="fa fa-heart" aria-hidden="true"></i><br>
        Customer Care </h4>
        <p class="text-center">We are committed to satisfy our customers by providing them with the necessary care and support service. We take our responsibility towards customer satisfaction, extremely seriously. We adopt a holistic approach to provide a choice that enables our customers to enjoy their life. To achieve this, we are based on the following aspects:</p>
        <ul>
            <li>We respond to the queries as quickly as possible</li>
            <li>We take our time to know our customers</li>
            <li>We think long term</li>
        </ul>
      </div>
      </div>
      </div>
  </div> --}}

@endsection