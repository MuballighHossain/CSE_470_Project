@extends('layouts.app')
@section('content')
<div class="prodbg">
    <div class=" container">
        @include('inc.msg')
        <div class="row">
            <div class="col-md-6 mt-5">
                <h4 class="">We would be happy to hear form you</h4>
                <p>Your opinion is important to us, if you have any queries, suggestions or complaints, please leave us a message via the contact form or send an e-mail to <b>info@savvyremedies.com</b>
                <br>
                <br>
We will reply to your queries with personalised attention.
<br>
EMEA INVEST LTD<br>
Kemp House, 152 City Road<br>
EC1V 2NX<br>
London <br>
The United Kingdom

                    <br> <br> We operate weekdays here. <br>   Contact us anytime by email and between time here by phone.</p>
                  <p><i class="fa fa-phone" aria-hidden="true"></i> 02037187304</p>
                   <p> <i class="fa fa-envelope" aria-hidden="true"></i>  info@savvyremedies.com</p>
                   <p> <i class="fa fa-calendar" aria-hidden="true"></i>  Monday-Friday</p>
                  <p><i class="fa fa-clock" aria-hidden="true"></i>  09:00 am -5:00 pm</p>

            </div>
            <div class="col-md-6">
    <div class="contact text-center mt-5">
        <!-- Material form contact -->
<div class="card m-4">
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
        <h5 class="pt-3">Contact Us</h5>
        <?php
         $user=Auth::user();
        ?>
        {!! Form::open(['action' => 'contactUsController@store','class'=>'text-center', 'style'=>'color:#757575;', 'method' => 'POST']) !!}

            <!-- Name -->
            <div class="md-form md-outline mt-3">
                @if (!empty($user))
                {{Form::label('name','Name')}}
                {{Form::text('name',$user->name,['class'=> 'form-control',])}}
                @else
                {{Form::label('name','Name')}}
                {{Form::text('name','',['class'=> 'form-control',])}}
                @endif
            </div>

            <!-- E-mail -->
            <div class="md-form md-outline">
                @if (!empty($user))
                {{Form::label('email','Email')}}
                {{Form::email('email',$user->email,['class'=> 'form-control','required'])}}
                @else
                {{Form::label('email','Email')}}
                {{Form::email('email','',['class'=> 'form-control','required'])}}
                @endif
            </div>
            <!--Message-->
            <div class="md-form md-outline">
                {{Form::label('msg','Message')}}
                {{Form::textarea('msg','',['class'=> 'form-control','rows'=>'3'])}}
            </div>
            {{Form::submit('send',['class'=>'btn btn-info my-4  btn-block z-depth-0 my-4 waves-effect'])}}
            {!! Form::close() !!}
        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form contact -->
    </div>
</div>
</div>
</div>
</div>
@endsection