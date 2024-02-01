@extends('layouts.app')
@section('page')
         
        <!-- Contact Us Area
        =====================================-->
        <div id="contact" class="pt100 pb100" style="background: url(assets/img/bg/new-img-bg-3.jpg) 0 0 no-repeat;">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="row">
                            
                            <!-- title start -->
                            <div class="col-md-12 margin-bottom-40">
                            <small class="color-light">{{__('call us')}}</small>
                                <h5 class="font-size-normal color-light">
                                    {{__('send message')}}
                                </h5>               
                                <p class="color-light">{{__('send message subtitle')}}</p>                        
                            </div>
                            <!-- title end -->
                            
                            <!-- contact info start -->
                            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                <h4 class="icon-map color-light"></h4>
                                <h6 class="color-light"><strong>Address</strong></h6>
                                <p class="color-light">Citra Raya Ruko Rembrandt R01 / 50R Cikupa Tangerang Banten 15710.</p>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                                <h4 class="icon-phone color-light "></h4>
                                <h6 class="color-light"><strong>Phone</strong></h6>
                                <p class="color-light">(021)5964 7597</p>
                            </div>
                            
                            <div class="col-md-4 col-sm-3 col-xs-6 text-center">
                                <h4 class="icon-envelope color-light "></h4>
                                <h6 class="color-light"><strong>Email</strong></h6>
                                <p class="color-light">sales@pt-ttt.co.id</p>
                            </div>
                            <!-- contact info end -->
                            
                        </div><!-- row left end -->
                    </div><!-- col left end -->
                    
                    <div class="col-md-6">
                        <div class="contact contact-us-one">
                        @if(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                                </div>
                        @endif
                            <div class="col-sm-12 col-xs-12 text-center margin-bottom-20">
                                <h6 class="pb25 bb-solid-1 text-uppercase">
                                Formulir Permintaan kunjungan</h6>
                                    <small class="text-lowercase">silakan lengkapi formulir dan kami akan menghubungi Anda kembali.</small>
                            </div>
                            <div class="contact-form text-center">
                            <form method="post" action="{{route('visit.send')}}">
                                @csrf
                                <!-- fullname start -->                            
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="nama_lengkap">Name:</label>
                                    <input type="text" name="name" id="name" class="input-md input-rounded form-control" placeholder="full name" maxlength="100" required>
                                </div>                                           
                                <!-- fullname end -->
                                
                                <!-- email start -->                            
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="input-md input-rounded form-control" placeholder="email" maxlength="100" required>
                                </div>                                        
                                 <!-- email end -->
                                
                                <!-- phone start -->                        
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="nomor_telepon">Phone number:</label>
                                    <input type="tel" name="phone" id="phone" class="input-md input-rounded form-control" placeholder="Phone" maxlength="100">
                                </div>                                             
                                <!-- phone end -->
                                
                                <!-- company start -->        
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="namaPerusahaan">Company Name:</label>
                                    <input type="text" name="namaPerusahaan" id="namaPerusahaan" class="input-md input-rounded form-control" placeholder="Company Name" required>
                                </div>                                      
                                  <!--company end -->

                                <!-- textarea start -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="tujuan_kunjungan">Message:</label>
                                    <textarea class="form-control" name="message" id="message" rows="7" required></textarea>
                                </div>
                                <!-- textarea end -->
                                
                                <!-- button start -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <button type="submit"  class="btn">Send Message</button>
                                </div>
                                <!-- button end -->
                            </form>
                        </div><!-- div contact end -->
                    </div><!-- col end -->
                    
                </div><!-- row end -->
            </div><!-- container end -->            
        </div>
        <!-- section contact end -->
@endsection