<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <header>
    <div class="sticky">
      <div class="container"> 
        
        <!-- Logo -->
        <div class="logo"> <a href="{{url('/')}}"><img class="img-responsive" src="{{ asset('images/logo-primary-1.png')}}" alt="" ></a> </div>
        <nav class="navbar ownmenu">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span> </button>
          </div>
          
          <!-- NAV -->
          <div class="collapse navbar-collapse" id="nav-open-btn">
            <ul class="nav">
              <li> <a href="{{ url('/')}}">{{__('home')}}</a></li>
              
              <li class="dropdown"><a href="{{ url('/about')}}">{{__('about')}}</a>
                <ul class="dropdown-menu">
                  <li> <a href="{{ url('/about/#welcome')}}">Welcome </a></li>
                  <li> <a href="{{ url('/about/#about')}}">History Company</a> </li>
                  <li> <a href="{{ url('/about/#visiMisi')}}">Vision & Mission</a> </li>
                </ul>
              </li>
              
              <li class="dropdown"> <a href="{{ url('/product')}}">{{__('product')}}</a></li>
              
              <li> <a href="{{ url('/request')}}" >{{__('request')}}</a>

              <li> <a href="{{ url('/contact')}}">{{__('contact')}}</a> </li>

              <li class="dropdown flag">
              <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <img src="{{__('images/' .app()->getLocale(). '.png')}}" width="20px" alt="">
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                @if(app()->getLocale() == 'en')
                <li><a href="{{ url('locale/id') }}"><img src="{{ asset('images/id.png')}}" width="20px" alt="id flag"></a></li>
                @endif
                @if(app()->getLocale() == 'id')
                <li><a href="{{ url('locale/en') }}"><img src="{{ asset('images/en.png')}}" width="20px" alt="id flag"></a></li>
                @endif
              </ul>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>