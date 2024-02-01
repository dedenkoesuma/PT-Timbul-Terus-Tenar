/*-----------------------------------------------------------------------------------*/
/* 		Mian Js Start 
/*-----------------------------------------------------------------------------------*/
$(document).ready(function($) {
	"use strict"
	/*-----------------------------------------------------------------------------------*/
	/*		STICKY NAVIGATION
	/*-----------------------------------------------------------------------------------*/
	$(".sticky").sticky({topSpacing:0});
	/*-----------------------------------------------------------------------------------*/
	/* 	LOADER
	/*-----------------------------------------------------------------------------------*/
	$("#loader").delay(500).fadeOut("slow");
	/*-----------------------------------------------------------------------------------*/
	/*  FULL SCREEN
	/*-----------------------------------------------------------------------------------*/
	$('.full-screen').superslides({});
	/*-----------------------------------------------------------------------------------*/
	/*    Parallax
	/*-----------------------------------------------------------------------------------*/
	jQuery.stellar({
	   horizontalScrolling: false,
	   scrollProperty: 'scroll',
	   positionProperty: 'position',
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* 		Parallax
	/*-----------------------------------------------------------------------------------*/
	$('ul.nav li.dropdown').hover(function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(400);
	}, function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(500).fadeOut(100);
	});
	/*-----------------------------------------------------------------------------------*/
	/* 		Parallax
	/*-----------------------------------------------------------------------------------*/
	$('.images-slider').flexslider({
	  animation: "fade",
	  controlNav: "thumbnails"
	});
	/*-----------------------------------------------------------------------------------*/
	/* 	GALLERY SLIDER
	/*-----------------------------------------------------------------------------------*/
	$('.block-slide').owlCarousel({
		loop:true,
		margin:30,
		nav:true,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:4,
				autoWidth:true
			}
		},
	});
		/*-----------------------------------------------------------------------------------*/
	/* 	GALLERY SLIDER about
	/*-----------------------------------------------------------------------------------*/
	$('.block-slide-about').owlCarousel({
		loop:true,
		margin:30,
		responsive:{
			0:{
				items:1,
				autoWidth:true
			},
			600:{
				items:2,
				autoWidth:true
			},
			1000:{
				items:4,
				autoWidth:true
			}
		},
	});
	/*-----------------------------------------------------------------------------------*/
	/* 	SLIDER REVOLUTION
	/*-----------------------------------------------------------------------------------*/
	jQuery('.tp-banner').show().revolution({
		dottedOverlay:"none",
		delay:10000,
		startwidth:1170,
		startheight:900,
		navigationType:"",
		navigationArrows:"solo",
		navigationStyle:"preview1",
		parallax:"mouse",
		parallaxBgFreeze:"on",
		parallaxLevels:[7,4,3,2,5,4,3,2,1,0],												
		keyboardNavigation:"on",						
		shadow:0,
		fullWidth:"on",
		fullScreen:"off",
		shuffle:"off",						
		autoHeight:"off",						
		forceFullWidth:"off",	
		fullScreenOffsetContainer:""	
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* 	TESTIMONIAL SLIDER
	/*-----------------------------------------------------------------------------------*/
	$(".single-slide").owlCarousel({ 
		items : 1,
		autoplay:true,
		loop:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		singleItem	: true,
		navigation : true,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		pagination : true,
		animateOut: 'fadeOut'	
	});
	$('.item-slide').owlCarousel({
		loop:true,
		margin:30,
		nav:true,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			400:{
				items:2
			},
			900:{
				items:3
			},
			1200:{
				items:4
			}
		}
	});
	/* ------------------------------------------------------------------------ 
	   SEARCH OVERLAP
	------------------------------------------------------------------------ */
	$(window).load(function() {
	  $('#shop-thumb').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 210,
		itemMargin: 5,
		asNavFor: '#slider-shop'
	  });
	$('#slider-shop').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#shop-thumb"
	  });
	});
	/* ------------------------------------------------------------------------ 
	   SEARCH OVERLAP
	------------------------------------------------------------------------ */
	jQuery('.search-open').on('click', function(){
		jQuery('.search-inside').fadeIn();
	});
	jQuery('.search-close').on('click', function(){
		jQuery('.search-inside').fadeOut();
	});
	/*-----------------------------------------------------------------------------------*/
	/* 		Active Menu Item on Page Scroll
	/*-----------------------------------------------------------------------------------*/
	$(window).scroll(function(event) {
			Scroll();
	});	
	$('.scroll a').on('click', function() {  
		$('html, body').animate({scrollTop: $(this.hash).offset().top -0}, 1000);
			return false;
	});
	// User define function
	function Scroll() {
	var contentTop      =   [];
	var contentBottom   =   [];
	var winTop      =   $(window).scrollTop();
	var rangeTop    =   0;
	var rangeBottom =   1000;
	$('nav').find('.scroll a').each(function(){
		contentTop.push( $( $(this).attr('href') ).offset().top);
			contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
	})
	$.each( contentTop, function(i){
	if ( winTop > contentTop[i] - rangeTop ){
		$('nav li.scroll')
		  .removeClass('active')
			.eq(i).addClass('active');			
	}}  )};
	});
	/*-----------------------------------------------------------------------------------*/
	/*    CONTACT FORM
	/*-----------------------------------------------------------------------------------*/
	function checkmail(input){
	  var pattern1=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		  if(pattern1.test(input)){ return true; }else{ return false; }}     
		function proceed(){
			var name = document.getElementById("name");
			var email = document.getElementById("email");
			var company = document.getElementById("company");
			var web = document.getElementById("website");
			var msg = document.getElementById("message");
			var errors = "";
			if(name.value == ""){ 
			name.className = 'error';
				return false;}    
			  else if(email.value == ""){
			  email.className = 'error';
			  return false;}
				else if(checkmail(email.value)==false){
					alert('Please provide a valid email address.');
					return false;}
				else if(company.value == ""){
					company.className = 'error';
					return false;}
			   else if(web.value == ""){
					web.className = 'error';
					return false;}
			   else if(msg.value == ""){
					msg.className = 'error';
					return false;}
			   else 
			  {
		$.ajax({
			type: "POST",
			url: "php/submit.php",
			data: $("#contact_form").serialize(),
			success: function(msg){
			//alert(msg);
			if(msg){
				$('#contact_form').fadeOut(1000);
				$('#contact_message').fadeIn(1000);
					document.getElementById("contact_message");
				 return true;
			}}
		});
	}};
	
	
	/*-----------------------------------------------------------------------------------
		Animated progress bars
	/*-----------------------------------------------------------------------------------*/
	$('.progress-bars').waypoint(function() {
	  $('.progress').each(function(){
		$(this).find('.progress-bar').animate({
		  width:$(this).attr('data-percent')
		 },100);
	});},
		{ 
		offset: '100%',
		triggerOnce: true 
	});
	
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	
	
	jQuery(document).ready(function($){
		var isLateralNavAnimating = false;
		
		//open/close lateral navigation
		$('.cd-nav-trigger').on('click', function(event){
			event.preventDefault();
			//stop if nav animation is running 
			if( !isLateralNavAnimating ) {
				if($(this).parents('.csstransitions').length > 0 ) isLateralNavAnimating = true; 
				
				$('body').toggleClass('navigation-is-open');
				$('.cd-navigation-wrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					//animation is over
					isLateralNavAnimating = false;
				});
			}
		});
	});
var slideshowDuration = 4000;
var slideshow=$('.main-content .slideshow');

function slideshowSwitch(slideshow,index,auto){
  if(slideshow.data('wait')) return;

  var slides = slideshow.find('.slide');
  var pages = slideshow.find('.pagination');
  var activeSlide = slides.filter('.is-active');
  var activeSlideImage = activeSlide.find('.image-container');
  var newSlide = slides.eq(index);
  var newSlideImage = newSlide.find('.image-container');
  var newSlideContent = newSlide.find('.slide-content');
  var newSlideElements=newSlide.find('.caption > *');
  if(newSlide.is(activeSlide))return;

  newSlide.addClass('is-new');
  var timeout=slideshow.data('timeout');
  clearTimeout(timeout);
  slideshow.data('wait',true);
  var transition=slideshow.attr('data-transition');
  if(transition=='fade'){
    newSlide.css({
      display:'block',
      zIndex:2
    });
    newSlideImage.css({
      opacity:0
    });

    TweenMax.to(newSlideImage,1,{
      alpha:1,
      onComplete:function(){
        newSlide.addClass('is-active').removeClass('is-new');
        activeSlide.removeClass('is-active');
        newSlide.css({display:'',zIndex:''});
        newSlideImage.css({opacity:''});
        slideshow.find('.pagination').trigger('check');
        slideshow.data('wait',false);
        if(auto){
          timeout=setTimeout(function(){
            slideshowNext(slideshow,false,true);
          },slideshowDuration);
          slideshow.data('timeout',timeout);}}});
  } else {
    if(newSlide.index()>activeSlide.index()){
      var newSlideRight=0;
      var newSlideLeft='auto';
      var newSlideImageRight=-slideshow.width()/8;
      var newSlideImageLeft='auto';
      var newSlideImageToRight=0;
      var newSlideImageToLeft='auto';
      var newSlideContentLeft='auto';
      var newSlideContentRight=0;
      var activeSlideImageLeft=-slideshow.width()/4;
    } else {
      var newSlideRight='';
      var newSlideLeft=0;
      var newSlideImageRight='auto';
      var newSlideImageLeft=-slideshow.width()/8;
      var newSlideImageToRight='';
      var newSlideImageToLeft=0;
      var newSlideContentLeft=0;
      var newSlideContentRight='auto';
      var activeSlideImageLeft=slideshow.width()/4;
    }

    newSlide.css({
      display:'block',
      width:0,
      right:newSlideRight,
      left:newSlideLeft
      ,zIndex:2
    });

    newSlideImage.css({
      width:slideshow.width(),
      right:newSlideImageRight,
      left:newSlideImageLeft
    });

    newSlideContent.css({
      width:slideshow.width(),
      left:newSlideContentLeft,
      right:newSlideContentRight
    });

    activeSlideImage.css({
      left:0
    });

    TweenMax.set(newSlideElements,{y:20,force3D:true});
    TweenMax.to(activeSlideImage,1,{
      left:activeSlideImageLeft,
      ease:Power3.easeInOut
    });

    TweenMax.to(newSlide,1,{
      width:slideshow.width(),
      ease:Power3.easeInOut
    });

    TweenMax.to(newSlideImage,1,{
      right:newSlideImageToRight,
      left:newSlideImageToLeft,
      ease:Power3.easeInOut
    });

    TweenMax.staggerFromTo(newSlideElements,0.8,{alpha:0,y:60},{alpha:1,y:0,ease:Power3.easeOut,force3D:true,delay:0.6},0.1,function(){
      newSlide.addClass('is-active').removeClass('is-new');
      activeSlide.removeClass('is-active');
      newSlide.css({
        display:'',
        width:'',
        left:'',
        zIndex:''
      });

      newSlideImage.css({
        width:'',
        right:'',
        left:''
      });

      newSlideContent.css({
        width:'',
        left:''
      });

      newSlideElements.css({
        opacity:'',
        transform:''
      });

      activeSlideImage.css({
        left:''
      });

      slideshow.find('.pagination').trigger('check');
      slideshow.data('wait',false);
      if(auto){
        timeout=setTimeout(function(){
          slideshowNext(slideshow,false,true);
        },slideshowDuration);
        slideshow.data('timeout',timeout);
      }
    });
  }
}

function slideshowNext(slideshow,previous,auto){
  var slides=slideshow.find('.slide');
  var activeSlide=slides.filter('.is-active');
  var newSlide=null;
  if(previous){
    newSlide=activeSlide.prev('.slide');
    if(newSlide.length === 0) {
      newSlide=slides.last();
    }
  } else {
    newSlide=activeSlide.next('.slide');
    if(newSlide.length==0)
      newSlide=slides.filter('.slide').first();
  }

  slideshowSwitch(slideshow,newSlide.index(),auto);
}

function homeSlideshowParallax(){
  var scrollTop=$(window).scrollTop();
  if(scrollTop>windowHeight) return;
  var inner=slideshow.find('.slideshow-inner');
  var newHeight=windowHeight-(scrollTop/2);
  var newTop=scrollTop*0.8;

  inner.css({
    transform:'translateY('+newTop+'px)',height:newHeight
  });
}

$(document).ready(function() {
 $('.slide').addClass('is-loaded');

 $('.slideshow .arrows .arrow').on('click',function(){
  slideshowNext($(this).closest('.slideshow'),$(this).hasClass('prev'));
});

 $('.slideshow .pagination .item').on('click',function(){
  slideshowSwitch($(this).closest('.slideshow'),$(this).index());
});

 $('.slideshow .pagination').on('check',function(){
  var slideshow=$(this).closest('.slideshow');
  var pages=$(this).find('.item');
  var index=slideshow.find('.slides .is-active').index();
  pages.removeClass('is-active');
  pages.eq(index).addClass('is-active');
});

/* Lazyloading
$('.slideshow').each(function(){
  var slideshow=$(this);
  var images=slideshow.find('.image').not('.is-loaded');
  images.on('loaded',function(){
    var image=$(this);
    var slide=image.closest('.slide');
    slide.addClass('is-loaded');
  });
*/

var timeout=setTimeout(function(){
  slideshowNext(slideshow,false,true);
},slideshowDuration);

slideshow.data('timeout',timeout);
});

if($('.main-content .slideshow').length > 1) {
  $(window).on('scroll',homeSlideshowParallax);
}

$(".hero-slider").owlCarousel({
	loop:true,
	autoplay:true,
	smartSpeed: 500,
	autoplayTimeout:3500,
	singleItem: true,
	autoplayHoverPause:true,
	items:1,
	nav:true,
	navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
	dots:false,
});