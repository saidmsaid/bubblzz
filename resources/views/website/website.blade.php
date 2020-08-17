<!DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- META -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- PAGE TITLE HERE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title style="text-transform: capitalize;">{{$title}}</title>
    <meta name="description" content="Bubblzz offers a wide range bath and body care products. Bubblzz was established by two chemists in 2014 using simple Chemistry to reinforce the use of wholesome and natural ingredients to nourish the skin from inside out. Our products are made from scratch, formulated from organic & essential oils, and are free from harsh chemicals. Our line includes soaps, bathbombs, lip balms, lip scrubs, deodorants, face and body scrubs, shower gels, lotions, facial cleaner, and hair care products. Our philosophy is what you put on your body is just as important as what you put inside your body! . ">
    <meta name="keywords" content="bubblzz, Bubblzz, bubblzzeg, bodycare,  bathbombs">
    <meta name="author" content="Bubblzz Egypt">
    <meta name="robots" content="Bubblzz Egypt">    
    
   
    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{asset('website\images\favicon.ico')}}" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('website\images\favicon.png')}}">
    
    
    <!-- [if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif] -->
    
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website/css\bootstrap.min.css')}}">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\fontawesome\css\font-awesome.min.css')}}">
    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\flaticon.min.css')}}">
    <!-- ANIMATE STYLE SHEET --> 
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\animate.min.css')}}">
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\owl.carousel.min.css')}}">
    <!-- BOOTSTRAP SELECT BOX STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\bootstrap-select.min.css')}}">
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\magnific-popup.min.css')}}">
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\loader.min.css')}}">    
    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\style.css')}}">
    <!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" class="skin" type="text/css" href="{{asset('website\css\skin\skin-1.css')}}">
    <!-- CUSTOM  STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\bubblzz.css')}}">
    <!-- SIDE SWITCHER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\switcher.css')}}">    
    <link rel="stylesheet" type="text/css" href="{{asset('website\css\jquery.steps.css')}}">    

    
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\plugins\revolution\revolution\css\settings.css')}}">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="{{asset('website\plugins\revolution\revolution\css\navigation.css')}}">
    
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800italic,800,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <script type="text/javascript">
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '657564674652066'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=657564674652066&ev=PageView
&noscript=1"/>
</noscript>
<script type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KT5X4Q2');</script>

</head>
@yield('headjs')
<body id="bg">
 
    <div class="page-wraper"> 
        
        <!-- HEADER START -->
        <header class="site-header header-style-8">
        
            <div class="top-bar bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="wt-topbar-left clearfix">
                            <ul class="list-unstyled e-p-bx pull-right">
                                <li><a href="{{url('/')}}" style="font-weight: bolder;">Home</a></li>
                                <li><a href="{{url('about')}}" style="font-weight: bolder;">About Us</a></li>
                                <li><a href="{{url('/contact')}}" style="font-weight: bolder;">Contact Us</a></li>
                                <li><a href="{{url('/shipping-and-policies')}}" style="font-weight: bolder;">Shipping & Policies</a></li>
                                <!--<li><i class="fa fa-phone"></i>(654) 321-7654</li>-->
                            </ul>
                        </div>

                        <div class="wt-topbar-right clearfix">
                            <ul class="social-bx list-inline pull-right" >
                                
                                @guest
                                    <li><a href="{{url('/account')}}"><i class="fa fa-user"></i></a></li>
                                @else
                                      <li class="nav-item dropdown" style="margin-bottom: 1%">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                           <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" style="color: black">
                                                {{ __('Logout') }}
                                            </a></li>
                                            

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @endguest
                                <li>
                                    
                                 <div class="vl"></div>
                                </li>
                                <li><a href="{{$contact->facebook}}" class="fa fa-facebook"></a></li>
                                <li>
                                    
                                <div class="vl"></div>
                                </li>
                                <li><a href="{{$contact->instagram}}" class="fa fa-instagram"></a></li>
                                <li>
                                    <div class="vl"></div>
                                </li>
                                <li><div class="extra-cell">
                                <a href="javascript:;" class="wt-cart cart-btn" title="Your Cart">
                                    <span class="link-inner">
                                       <!-- <span class="woo-cart-total"> </span>
                                        <span class="woo-cart-count">
                                            <span class="shopping-bag wcmenucart-count">{{count($cart)}}</span>
                                        </span>-->
                                        <span class="fa fa-shopping-bag"></span>
                                        
                                          <span class="count">{{count($cart)}}</span>
                                        
                                    </span>
                                </a>
                                
                                  <div class="cart-dropdown-item-wraper clearfix">
                                    <div class="nav-cart-content">
                                        
                                        <div class="nav-cart-items p-a15">
                                        @foreach($cart as $carts)

                                             @include('website.cartResult')
                                         @endforeach   
                                        </div>
                                        <div class="nav-cart-title p-tb10 p-lr15 clearfix">
                                            <h4 class="pull-left m-a0">Subtotal:</h4>
                                            <h5 class="pull-right m-a0">EGP {{$total}}</h5>
                                        </div>
                                        <div class="nav-cart-action p-a15 clearfix">
                                            <a class="site-button  btn-block m-b15 " href="{{ Route('cart.index')}}" style="text-align: center">View Cart</a>
                                            
                                            <a class="site-button  btn-block" type="button" href="{{url('/checkout')}}" style="text-align: center">Checkout </a>
                                        </div>
                                    </div>
                                  </div>
                               {{-- <div class="vl"></div>
                               --}}
                                
                            </div></li>

                            @if(Auth::check())
                                 <li>
                                    <div class="vl"></div>
                                </li>
                                   <li><div class="extra-cell">
                                <a href="{{ Route('wishlist.index')}}"  title="Your Wishlist">
                                    <span class="link-inner">
                                       <!-- <span class="woo-cart-total"> </span>
                                        <span class="woo-cart-count">
                                            <span class="shopping-bag wcmenucart-count">{{count($cart)}}</span>
                                        </span>-->
                                        <span class="fa fa-heart"></span>
                                        
                                         
                                        
                                    </span>
                                </a>
                                
                                  
                               {{-- <div class="vl"></div>
                               --}}
                                
                            </div></li>

                                @endif
                            </ul>
                            
                        </div>

                    </div>
                </div>
            </div>
            <!-- Search Link -->

            <!-- Search Form -->
            <div class="header-middle bg-white">
                <div class="container">
                    <div class="logo-header">
                        <a href="{{url('/')}}">
                            <img src="{{asset('website\images\logo-7.png')}}"  alt="">
                        </a>
                    </div>
                    
                </div>
            </div>
            
            <!-- Search Form -->
            <div class="sticky-header main-bar-wraper">
                <div class="main-bar header-botton nav-bg-secondry">
                    <div class="container">
                        <!-- NAV Toggle Button -->
                        <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- ETRA Nav -->
                        <!--<div class="extra-nav">
                            
                            <div class="extra-cell">
                                <a href="javascript:;" class="wt-cart cart-btn" title="Your Cart">
                                    <span class="link-inner">
                                        <span class="woo-cart-total"> </span>
                                        <span class="woo-cart-count">
                                            <span class="shopping-bag wcmenucart-count">{{count($cart)}}</span>
                                        </span>
                                    </span>
                                </a>
                                
                                  <div class="cart-dropdown-item-wraper clearfix">
                                    <div class="nav-cart-content">
                                        
                                        <div class="nav-cart-items p-a15">
                                        @foreach($cart as $carts)

                                             @include('website.cartResult')
                                         @endforeach   
                                        </div>
                                        <div class="nav-cart-title p-tb10 p-lr15 clearfix">
                                            <h4 class="pull-left m-a0">Subtotal:</h4>
                                            <h5 class="pull-right m-a0">${{$total}}</h5>
                                        </div>
                                        <div class="nav-cart-action p-a15 clearfix">
                                            <a class="site-button  btn-block m-b15 " href="{{ Route('cart.index')}}" style="text-align: center">View Cart</a>
                                            <a class="site-button  btn-block" type="button" href="{{url('/checkout')}}" style="text-align: center">Checkout </a>
                                        </div>
                                    </div>
                                  </div>
                                
                            </div>
                         </div>-->
                        <!-- SITE Search -->
                        <!--<div id="search"> 
                            <span class="close"></span>
                            <form role="search" id="searchform" action="javascript:void(0);" method="get" class="radius-xl">
                                <div class="input-group">
                                    <input value="" name="q" type="search" placeholder="Type to search">
                                    <span class="input-group-btn"><button type="button" class="search-btn"><i class="fa fa-search"></i></button></span>
                                </div>   
                            </form>
                        </div>
                        -->
                        <!-- MAIN Nav -->
                        <div class="header-nav navbar-collapse collapse ">
                            <ul class=" nav navbar-nav" id="navbar">
                                <li ><a href="{{url('/')}}">home</a></li>
                                @foreach($category as $categories)
                                    <li @if($categories->children->count() > 0  ) class="has-child" @endif>
                                        <a @if($categories->children->count() > 0  ) href="javascript:;" @else href="{{url('/category/'.$categories->category_slug)}}" @endif>{{$categories->name}}</a>
                                        @if($categories->children->count() > 0  )
                                            <ul class="sub-menu">
                                                @foreach($categories->children as $child)
                                                <li class="has-child">
                                                    <a href="{{url('/category/'.$child->category_slug)}}">{{$child->name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <!--<a href="{{url('/category/'.$categories->id)}}">{{$categories->name}}</a>
                                        -->
                                    </li>
                               @endforeach
                             
                                
                                
                               
                            </ul>

                        </div>
                    </div>
                </div>

            </div>            
            
        </header>
        <!-- HEADER END -->
            @yield('content')

                    <!-- FOOTER BLOCKES START -->  
       <!--     <div class="footer-top overlay-wraper">
                <div class="overlay-main"></div>
                <div class="container">
                    <div class="row">
           -->             <!-- ABOUT COMPANY -->
              <!--          <div class="col-md-4 col-sm-6">  
                            <div class="widget widget_about">
                                <h4 class="widget-title">About Company</h4>
                                <div class="logo-footer clearfix p-b15">
                                    <a href="{{url('/')}}"><img src="{{asset('website\images\logo-7.png')}}" width="230" height="67" alt=""></a>
                                </div>
                                <p>{{$about->about}}
                                </p>  
                            </div>
                        </div> 

                  -->      <!-- USEFUL LINKS -->
                     <!--   <div class="col-md-4 col-sm-6">
                            <div class="widget widget_services">
                                <h4 class="widget-title">Useful links</h4>
                                <ul>
                                    <li><a href="{{url('about')}}">About</a></li>
                                    <li><a href="{{url('contact')}}">Contact</a></li>
                                    
                                </ul>
                            </div>
                        </div>-->
                        <!-- NEWSLETTER -->
                        <!--<div class="col-md-4 col-sm-6">
                            <div class="widget widget_newsletter">
                                <h4 class="widget-title">Newsletter</h4>
                                <div class="newsletter-bx">
                                    <form  method="post" action="{{url('/newsletter')}}" id="newsletter">
                                    {{csrf_field()}}
                                    {{method_field('POST')}}
                                        <div class="input-group">
                                        <input name="email" class="form-control" placeholder="ENTER YOUR EMAIL" type="email" >
                                        <span class="input-group-btn">
                                            <button type="submit" class="site-button" id="newSubmit"><i class="fa fa-paper-plane-o"></i></button>
                                        </span>
                                    </div>
                                     </form>
                                        
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:white"></strong>
                                                    </span>
                                        
                                     <p ><strong style="color:white" id="successNew"></strong></p>
                                </div>
                            </div>
                            --><!-- SOCIAL LINKS -->
                            <!--<div class="widget widget_social_inks">
                                <h4 class="widget-title">Social Links</h4>
                                <ul class="social-icons social-square social-darkest">
                                    <li><a href="{{$contact->facebook}}" class="fa fa-facebook"></a></li>
                                    <li><a href="{{$contact->instagram}}" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    
                       <div class="col-md-3 col-sm-6  p-tb20">
                           <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                                <div class="icon-md text-primary">
                                    <span class="iconmoon-travel"></span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase m-b0">Address</h5>
                                    <p>{{$contact->address}}</p>
                                </div>
                           </div>
                        </div>
                       <div class="col-md-3 col-sm-6  p-tb20 ">
                           <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix ">
                                <div class="icon-md text-primary">
                                    <span class="iconmoon-smartphone-1"></span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase m-b0">Phone</h5>
                                    <p>{{$contact->mobile}}</p>
                                    <p class="m-b0">{{$contact->phone}}</p>
                                </div>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-6  p-tb20">
                           <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                                <div class="icon-md text-primary">
                                    <span class="iconmoon-fax"></span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase m-b0">Fax</h5>
                                    <p class="m-b0">{{$contact->fax}}</p>
                                    
                                </div>
                            </div>
                        </div>
                       <div class="col-md-3 col-sm-6 p-tb20">
                           <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                                <div class="icon-md text-primary">
                                    <span class="iconmoon-email"></span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase m-b0">Email</h5>
                                    <p class="m-b0"><a href="{{$contact->email}}" >{{$contact->email}}</a></p>
                                    
                                </div>
                            </div>
                        </div>

                  </div>
                </div>
            </div>-->
            <!-- FOOTER COPYRIGHT -->
            <div class="footer-bottom overlay-wraper">
                <div class="overlay-main"></div>
              
                <div class="container p-t30">
                    <div class="row">
                        <div class="wt-footer-bot-left">
                            <span class="copyrights-text">© 2019 <a href="https://bubblzzeg.com/">  Bubblzz</a>. All Rights Reserved.</span>
                        </div>
                        <div class="wt-footer-bot-right">
                            <ul class="copyrights-nav pull-right"> 
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

        <!-- BUTTON TOP START -->
        <button class="scroltop" style="  background-color: #fff;"><span class=" iconmoon-house relative" id="btn-vibrate"></span>Top</button>
        
    </div>
    

<!-- JAVASCRIPT  FILES ========================================= --> 
<script type="text/javascript" src="{{asset('website\js\jquery-1.12.4.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script type="text/javascript" src="{{asset('website\js\jquery.steps.min.js')}}"></script><!-- JQUERY.MIN JS -->


<script type="text/javascript" src="{{asset('website\js\bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->

<script type="text/javascript" src="{{asset('website\js\bootstrap-select.min.js')}}"></script><!-- FORM JS -->
<script type="text/javascript" src="{{asset('website\js\jquery.bootstrap-touchspin.min.js')}}"></script><!-- FORM JS -->

<script type="text/javascript" src="{{asset('website\js\magnific-popup.min.js')}}"></script><!-- MAGNIFIC-POPUP JS -->

<script type="text/javascript" src="{{asset('website\js\waypoints.min.js')}}"></script><!-- WAYPOINTS JS -->
<script type="text/javascript" src="{{asset('website\js\counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script type="text/javascript" src="{{asset('website\js\waypoints-sticky.min.js')}}"></script><!-- COUNTERUP JS -->

<script type="text/javascript" src="{{asset('website\js\isotope.pkgd.min.js')}}"></script><!-- MASONRY  -->

<script type="text/javascript" src="{{asset('website\js\owl.carousel.min.js')}}"></script><!-- OWL  SLIDER  -->

<script type="text/javascript" src="{{asset('website\js\stellar.min.js')}}"></script><!-- PARALLAX BG IMAGE   --> 
<script type="text/javascript" src="{{asset('website\js\scrolla.min.js')}}"></script><!-- ON SCROLL CONTENT ANIMTE   -->

<script type="text/javascript" src="{{asset('website\js\custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script type="text/javascript" src="{{asset('website\js\shortcode.js')}}"></script><!-- SHORTCODE FUCTIONS  -->
<script type="text/javascript" src="{{asset('website\js\switcher.js')}}"></script><!-- SWITCHER FUCTIONS  -->

<!-- REVOLUTION JS FILES -->

<script type="text/javascript" src="{{asset('website\plugins\revolution\revolution\js\jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website\plugins\revolution\revolution\js\jquery.themepunch.revolution.min.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    
<script type="text/javascript" src="{{asset('website\plugins\revolution\revolution\js\extensions\revolution-plugin.js')}}"></script>

<!-- REVOLUTION SLIDER FUNCTION  ===== -->
<script type="text/javascript" src="{{asset('website\js\rev-script-1.js')}}"></script>
<!-- LOADING AREA START ===== -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KT5X4Q2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script type="text/javascript" src="{{asset('website\js\test.js')}}"></script><!-- test FUCTIONS  -->
<script type="text/javascript" src="{{asset('website\js\bubblzz.js')}}"></script><!-- Website FUCTIONS  -->
<script type="text/javascript" src="{{asset('website\js\cart.js')}}"></script><!-- Cart FUCTIONS  -->
<script type="text/javascript" src="{{asset('website\js\wishlist.js')}}"></script><!-- Wishlist FUCTIONS  -->
<script type="text/javascript" src="{{asset('website\js\checkout.js')}}"></script><!-- Checkout FUCTIONS  -->
<script type="text/javascript" src="{{asset('website\js\jquery.validate.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script type="text/javascript" src="{{asset('website\js\jquery.stepy.js')}}"></script><!-- JQUERY.MIN JS -->
<!--<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="cssload-container">
            <div class="cssload-progress cssload-float cssload-shadow">
                <div class="cssload-progress-item"></div>
            </div>
        </div>
    </div>
</div>-->
<!-- LOADING AREA  END ====== -->

<!-- STYLE SWITCHER  ======= --> 
<script type="text/javascript">
     $(document).ready(function(){
    $('#state_id').change(function(){
      if($(this).val() !== '')
      {
       
        $('#shipping_price').html("0.00 EGP");
      $('#cart_total').html(+$('#cart_subtotal').data("subtotal") +" EGP");
        var select    = $(this).attr("id"),
            value     = $(this).val(),
           // _token    = $('#city_token').val();
            _token    = $('input[name="_token"]').val();
           var url ="{{route('getCity')}}";
             
        $.ajax({
          url:"{{route('getCity')}}",
          method:"POST",
          data:{select:select,value:value,_token:_token},
          success:function(result){
            
            $('#city').html(result);
          }
        });
       
      }
    });
 });
</script>


  <script>

      //step wizard

      $(function() {
          $('#default').stepy({
              backLabel: 'Previous',
              block: true,
              nextLabel: 'Next',
              titleClick: true,
              titleTarget: '.stepy-tab',
              validate: false, 
          });
      });
  </script>
  @yield('js')
</body>

</html>
