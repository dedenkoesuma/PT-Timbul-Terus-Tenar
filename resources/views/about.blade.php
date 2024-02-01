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
    <!-- welcome -->
    <div id="welcome" class="padding-bottom-100 padding-top-100">
        <div class="container">
            <div class="row">
                
                <!-- title start -->
                <div class="col-md-12 text-center">
                <small>{{__('welcome')}}</small>
                    <h5>{{__('we are present')}}</h5>
                </div>
                <!-- title end -->
                
                <!-- title description start -->
                <div class="col-md-8 col-md-offset-2 text-center ">
                    <p> {{__('to be the solution')}}</p>
                </div>
                <!-- title description end -->
            </div>
            
            <div class="row text-center">
                
                <!-- item one start -->
                <div class="col-md-4 col-sm-6 col-xs-12 animated fadeInLeft visible margin-top-25" data-animation="fadeInLeft" data-animation-delay="100">
                    <div class="content-box content-box-center">                        
                        <img src="{{ asset('images/proactive.png')}}" width="55" style="margin-left:25px;">
                            <h6>Proactive</h6>
                        <p> {{__('detailProactive')}}</p>
                
                    </div>
                </div>
                <!-- item one end -->
                
                <!-- item one start -->
                <div class="col-md-4 col-sm-6 col-xs-12 animated fadeInLeft visible margin-top-25" data-animation="fadeInLeft" data-animation-delay="100">
                    <div class="content-box content-box-center">                        
                        <img src="{{ asset('images/respecfull.png')}}" width="50">
                            <h6>RESPECT-FULL</h6>
                        <p>{{__('detailRespect')}}</p>
                
                    </div>
                </div>
                <!-- item one end -->
                
                <!-- item one start -->
                <div class="col-md-4 col-sm-6 col-xs-12 animated fadeInLeft visible margin-top-25" data-animation="fadeInLeft" data-animation-delay="100">
                    <div class="content-box content-box-center">                        
                        <img src="{{ asset('images/open-mind.png')}}" width="45">
                            <h6>Open Mind</h6>
                        <p>{{__('detailOpenmind')}}</p>
                
                    </div>
                </div>
                <!-- item one end -->
                
            </div>                
        </div>
    </div>
    <!-- welcome end -->
    <!-- About Area
        ===================================== -->
        <div id="about" class="light-gray-bg padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="images/slide-bg-111.jpg" alt="about us" class="img-responsive center-block">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 text-about">
                        <h5>
                            <span class="strong">{{__('title history')}}</span>
                        </h5>
                        @if(app()->getLocale() == 'id')
                        <p>
                        Sejak didirikan pada tahun 2018, PT Timbul Terus Tenar <strong><em>terus</em></strong> menorehkan perjalanan <strong><em>yang sukses secara signifikan,</em></strong> Sebagai spesialis alat potong, PT Timbul Terus Tenar dengan cepat meraih pengakuan dari berbagai perusahaan besar dalam menyediakan solusi cutting tools dan <strong><em>abrasive</em></strong>  serta general item terbaik. <strong><em>Dengan</em></strong> dukungan dari tim <strong><em> yang berkompetensi</em></strong> dan berpengalaman, <strong><em>serta komitmen dan inovasi</em></strong> untuk layanan <strong><em>after service</em></strong> yang unggul membawa perusahaan ini pada sejumlah prestasi gemilang. <strong><em>Melalui No</em></strong> Sertifikasi ISO 90012015 PT Timbul Terus Tenar menegaskan dedikasi <strong><em>penuh</em></strong> dalam memberikan nilai tambah kepada pelanggan. Melalui kolaborasi dengan brand <strong><em>import</em></strong> ternama dan pelayanan yang andal PT Timbul Terus Tenar terus maju sebagai mitra yang <strong><em>terpercaya</em></strong> handal dan kreatif dalam memenuhi kebutuhan industri yang terus berkembang.
                        </p>
                        @endif
                        @if(app()->getLocale() == 'en')
                        <p>
                            Since its establishment in 2018, PT Timbul Terus Tenar <strong><em>continuously</em></strong> carves a significantly successful journey. . As a specialist in cutting tools, PT Timbul Terus Tenar quickly gains recognition from various major companies in providing the best  <strong><em>cutting tools </em></strong>and <strong><em>abrasive </em></strong>solutions, as well as general items. <strong><em>With</em></strong> support from a competent and experienced team, <strong><em>and a commitment to innovation</em></strong> in <strong><em>after-service excellence</em></strong>, this company has achieved several brilliant milestones. Through ISO 9001:2015 Certification, PT Timbul Terus Tenar is  <strong><em>fully dedicated</em></strong> on Providing added value to customers. Through collaborations with renowned <strong><em>imported brands</em></strong> and reliable services, PT Timbul Terus Tenar Consistently evolves as a dependable, innovative, and trustworthy partner adept at meeting the demands of an ever-evolving industry.
                        </p>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
        
    <!-- about end -->
    
        <!-- FAQ Area
        ===================================== -->
        <div id="visiMisi" class=" padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <h5 class="text-center strong ">                          
                    <span class="strong ">{{__('title visimision')}}</span>
                    </h5>   
                </div>
                
                <div class="row">
                    
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 padding-top-25">                    
                        <div class="panel-group" id="accordion5">
                            
                            <div class="panel">
                                <div class="panel-heading">
                                    <a class="collapsed accordian-toggle-chevron-left visi-misi">{{__('vision')}}</a>
                                </div>
                                <div class="panel-collapse collapse in active">
                                    <div class="panel-body">
                                        {{__('detailVision')}}
                                    </div>
                                </div>                                
                            </div>
                            
                            <div class="panel">
                                <div class="panel-heading">
                                    <a class="collapsed accordian-toggle-chevron-left visi-misi" >{{__('mision')}}</a>
                                </div>
                                <div class="panel-collapse">
                                    <div class="panel-body">
                                        <ol> 
                                            <li>{{__('detailMision1')}}</li>
                                            <br>
                                            <li>{{__('detailMision2')}}</li>
                                             <br>
                                            <li>{{__('detailMision3')}}</li>
                                        </ol>
                                    </div>
                                </div>                                
                            </div>
                            
                        </div>                        
                    </div>
                </div>
                
            </div>
        </div>
        <!-- faq end -->
      
      <!-- patner and client -->
       <!-- patner and client -->
<section class="padding-top-50">
    <div class="container"> 
        <!-- Main Heading -->
        <div class="heading text-center">
            <h4>Partner</h4>
        </div>

        <div class="papular-block block-slide-about margin-top-20"> 
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-1.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-1.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-2.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-2.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-3.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-3.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-4.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-4.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-5.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-5.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-6.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-6.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            <!-- item end -->
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-7.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-7.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-8.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-8.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            <div class="item"> 
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1 img-responsive" src="images/client-9.png" width="500px" height="100px" alt="Logo Client">
                    <img class="img-2 img-responsive" src="images/client-9.png" alt="Logo Client">
                </div>
            </div>
            <!-- item end -->
            

        </div>
    </div>
</section>
      <!-- patner and client end -->
      <!-- contact me -->
      <section class="news-letter light-gray-bg padding-top-50 padding-bottom-150">
        <div class="container">
          <div class="heading light-head text-center margin-bottom-30 margin-top-70 ">
            <h6 class="dark-text">{{__('letJoin')}}</h6>
            <span>{{__('joinsubtitle')}}</span> </div>
            <div class="text-center margin-top-10">
                <a href="/contact" class="btn news btn-small btn-round">Join Now!</a>
            </div>
        </div>
      </section>
    </div>
   <!-- contact me -->
@endsection

