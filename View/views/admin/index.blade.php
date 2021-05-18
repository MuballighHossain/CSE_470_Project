@extends('admin.skeleton')
@section('content')
    <div class="container">
        <div class="container my-5">

            <!-- Section -->
            <section>
          
              <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">Savvy.com</h6>
              <h3 class="font-weight-bold text-center dark-grey-text pb-2">Welcome to Savvy Admin dashboard</h3>
              <hr class="w-header my-4">
              <p class="lead text-center text-muted pt-2">In the left you will see the following sections</p>
                <p class="text-center text-muted pt-2 mb-5"> Please follow the documentation below to manage the site.</p>
              <div class="row">
          
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card text-center bg-success text-white wow fadeIn">
                    <div class="card-body">
                      <p class="mt-4 pt-2"><i class="fas fa-wine-bottle fa-4x"></i></p>
                      <h5 class="font-weight-normal my-4 py-2"><a class="text-white" href="#">Products</a></h5>
                      <p class="mb-3 text-left"><strong> New Products- </strong><br>
                        You can create and post new products on the site. It contains all the necessarry input fields required to post a product.</p>
                        <p class="mb-1 text-left"><strong>Products List- </strong><br>
                         Contains all the product. You can edit,update or delete your product from that section.</p>
                    </div>
                  </div>
                  <div class="card text-center mdb-color darken-1 text-white mt-5 wow fadeIn">
                    <div class="card-body">
                      <p class="mt-4 pt-2"><i class="fas fa-cog fa-4x"></i></p>
                      <h5 class="font-weight-normal my-4 py-2"><a class="text-white" href="#">Settings</a></h5>
                      <p class="mb-3 text-left">
                        You can Edit your website content- Landing Page, About and your Address Information from the settings.</p>
                    </div>
                  </div>

                </div>
          
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card text-center wow fadeIn">
                    <div class="card-body">
                      <p class="mt-3 pt-2"><i class="fas fa-shopping-cart fa-4x grey-text"></i></p>
                      <h5 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="#">Orders</a></h5>
                      <p class="mb-2 text-left"><strong>Order List- </strong><br>
                        Your current Order list will be shown in that section. you will be able to manage your orders</p>
                        <p class="mb-2 text-left"><strong>Completed- </strong><br>
                         In the completed section all the orders that are shipped and delivered will be shown.  </p>
                         <p class="mb-2 text-left"><strong>Add Shipping Region- </strong><br>
                          Add country/Region for delivery</p>
                          <p class="mb-2 text-left"><strong>Shipping Region List- </strong><br>
                            Edit/Delete your Shipping Region(s)</p>
                    </div>
                  </div>
                </div>
          
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card text-center info-color text-white wow fadeIn">
                    <div class="card-body">
                      <p class="mt-4 pt-2"><i class="far fa-smile-beam fa-4x"></i></p>
                      <h5 class="font-weight-normal my-4 py-2"><a class="text-white" href="#">Lifestyle</a></h5>
                      <p class="mb-4 text-left"><strong>Write Blog- </strong><br>
                        write blogs on a certain topic for your lifestyle section. It will help you boost your marketing.</p>
                        <p class="mb-5 text-left"><strong>blog List-</strong><br>
                         All the blogs will be listed in this section. you can choose to edit or delete them.</p>
                    </div>
                  </div>
                  <div class="card text-center  bg-success text-white mt-5 wow fadeIn">
                    <div class="card-body">
                      <p class="mt-4 pt-2"><i class="fas fa-user fa-4x"></i></p>
                      <h5 class="font-weight-normal my-4 py-2"><a class="text-white" href="#">Account</a></h5>
                      <p class="mb-4 text-left">
                        Your Account infromation and logout option.</p>
                    </div>
                  </div>
                </div>
          
                <div class="col-md-6 col-xl-3">
                  <div class="card text-center wow fadeIn">
                    <div class="card-body">
                      <p class="mt-4 pt-2"><i class="fas fa-users fa-4x grey-text"></i></p>
                      <h5 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="#">Users</a></h5>
                      <p class="mb-4 text-left"><strong>user List- </strong><br>
                        All your customer/user list will be in that section along with thier credentials.</p>
                        <p class="mb-5 text-left"><strong>Monitor</strong><br>
                        Monitor user activities in our site.</p>
                    </div>
                  </div>
                </div>
          
              </div>
          
            </section>
            <!-- Section -->
          
          </div>
    </div>
@endsection