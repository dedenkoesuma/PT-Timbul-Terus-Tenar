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
      
    <!-- Knowledge Share -->
    <section class="light-gray-bg padding-top-50 padding-bottom-150">
      <div class="container"> 
        
        <!-- Main Heading -->
        <div class="heading text-center knowledge-title">
          <h4>{{__('title request')}}</h4>
          <span>{{__('subtitle request')}}</span> </div>
        <div class="knowledge-share">
          <ul class="row">
            
            <!-- Post 1 -->
            <li class="col-md-6 col-sm-6">
              <h2>{{__('tittle visit')}}</h2>
              <p>{{__('detail visit')}}</p>
              <a class="btn-share" href="{{ url('/visit') }}">{{__('btn visit')}}</a>
            
            <!-- Post 2 -->
            <li class="col-md-6 col-sm-6">
              <h2>{{__('tittle trial')}}</h2>
              <p>{{__('detail trial')}}</p>
              <a class="btn-share" href="{{ url('/trial') }}">{{__('btn trial')}}</a>
          </ul>
        </div>
      </div>
    </section>
    
@endsection