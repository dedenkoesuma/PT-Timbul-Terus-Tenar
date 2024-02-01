@extends('layouts.app')
@section('page')
 
        <!-- Intro Area
        ===================================== -->
        <section class="sub-bnr" data-stellar-background-ratio="0.5">
            <div class="position-center-center">
            <div class="container">
                <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">{{$title}}</li>
                </ol>
            </div>
            </div>
        </section>
    <!-- intro end -->
      
    <!--======= CONATACT  =========-->
    <section class="contact padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="contact-form">
            <small>{{__('sub Contact')}}</small>
          <h5>{{__('title Contact')}}</h5>
          <div class="row">
            <div class="col-md-8"> 
              
              <!--======= Success Msg =========-->
              @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
              @endif
              <!--======= FORM  =========-->
              <form id="contact_form" class="contact-form" method="post" action="{{ route('contact.send')}}" >
                @csrf
                <ul class="row">
                  <li class="col-sm-6">
                    <label>full name *
                      <input type="text" class="form-control" name="name" id="name"maxlength="100" required>
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Email *
                      <input type="text" class="form-control" name="email" id="email"maxlength="100" required>
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone *
                      <input type="tel" class="form-control" name="phone" id="phone" maxlength="100">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>SUBJECT
                      <input type="text" class="form-control" name="subject" id="subject" maxlength="100">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Message
                      <textarea class="form-control" name="message" id="message" rows="5" ></textarea>
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <button type="submit" class="btn">SEND MAIL</button>
                  </li>
                </ul>
              </form>
            </div>
            
            <!--======= ADDRESS INFO  =========-->
            <div class="col-md-4">
              <div class="contact-info">
                <h6>{{__('addres')}}</h6>
                <ul>
                  <li> <i class="icon-map-pin"></i> Citra Raya Ruko Rembrandt R01 / 50R Cikupa Tangerang Banten 15710</li>
                  <li> <i class="icon-call-end"></i>(021)5964 7597</li>
                  <li> <i class="icon-envelope"></i> <a href="mailto:sales@pt-ttt.co.id" target="_top">sales@pt-ttt.co.id</a> </li>
                </ul>
              </div>
            </div>
            <!--  -->
          </div>
        </div>
      </div>
    </section>
    
        <!-- Google Map Area
        ===================================== -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d991.4849448803086!2d106.5318651!3d-6.2716498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42072e2082aefd%3A0xce6b9cdea53639a5!2sPT.%20Timbul%20Terus%20Tenar!5e0!3m2!1sid!2sid!4v1692188555084!5m2!1sid!2sid" width="1920" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection