@extends('website.website')

@section('content')
<!-- CONTENT START -->
        <div class="page-content">
        
                       <!-- SLIDER START -->
            <div id="rev_slider_1050_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="webproduct-light" data-source="gallery" style="background-color:transparent;padding:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                <div id="rev_slider_1050_1" class="slider-dots rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                    <ul>    
                    @foreach($slider as $slider)
                        <!-- SLIDE  -->
                        <li data-index="rs-2938" data-transition="slideleft" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{asset('storage/public/imageSlider/'.$slider->image)}}" data-rotate="0" data-fsslotamount="7" data-saveperformance="off" data-title="" data-param1="Additional Text" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{asset('storage/public/imageSlider/'.$slider->image)}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="">
                            <!-- LAYERS -->
                           
                    
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption WebProduct-Title   tp-resizeme" id="slide-2938-layer-01" data-x="['left','left','left','left']" data-hoffset="['60','60','20','20']" data-y="['middle','middle','top','top']" data-voffset="['-80','-80','200','130']" data-fontsize="['84','55','55','36']" data-lineheight="['65','65','65','65']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1000,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;
                                white-space: nowrap;
                                text-transform:capitalize;
                                font-size: 84px;
                                line-height: 90px;
                                font-weight: 700;
                                color: rgb(255, 255, 255);
                                letter-spacing: 0px;
                                font-family: Amatic SC;
                                text-shadow: rgba(0, 0, 0, 0.6) 2px 2px 4px;
                                visibility: inherit;
                                text-align: inherit;
                                border-width: 0px;
                                margin: 0px;
                                padding: 0px;
                                min-height: 0px;
                                min-width: 0px;
                                max-height: 100%;
                                max-width: 100%;
                                opacity: 1;
                                transform: translate3d(0px, 0px, 0px);
                                transform-origin: 50% 50% 0px;
                                transition: none 0s ease 0s;">
                                <div class="text-secondrys"> {{$slider->text}}  </div>
                                </div>
                    
                            <!-- LAYER NR. 2 -->
                            
                    
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption WebProduct-Content   tp-resizeme" id="slide-2938-layer-03" data-x="['left','left','left','left']" data-hoffset="['60','60','20','20']" data-y="['middle','middle','top','top']" data-voffset="['80','80','380','250']" data-fontsize="['21','21','24','18']" data-lineheight="['28','28','32','26']" data-width="['700','700','700','300']" data-height="['none','none','76','68']" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1500,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13; white-space: normal;text-transform:left;">
                                <div class="text-secondrys"> {{$slider->description}}</div>
                                </div>
                    
                            <!-- LAYER NR. 4 -->
                            
                                                           
                        </li>
                        @endforeach
                        <!-- SLIDE  -->
                        <!--
                        <li data-index="rs-2940" data-transition="slideleft" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{asset('website/images/main-slider/slider2/18.jpeg')}}" data-rotate="0" data-fsslotamount="7" data-saveperformance="off" data-title="" data-param1="Additional Text" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            --><!-- MAIN IMAGE -->
                            <!--<img src="{{asset('website/images/main-slider/slider2/18.jpeg')}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="">-->
                            <!-- LAYERS -->
                           
                    
                            <!-- LAYER NR. 1 -->
                            <!--
                            <div class="tp-caption WebProduct-Title   tp-resizeme" id="slide-2940-layer-01" data-x="['left','left','left','left']" data-hoffset="['60','60','20','20']" data-y="['middle','middle','top','top']" data-voffset="['-80','-80','200','130']" data-fontsize="['57','55','55','45']" data-lineheight="['65','65','65','65']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1000,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11;
                                white-space: nowrap;
                                text-transform:uppercase;">
                                <div class="text-secondrys"> Beauty <span class="text-primarys"> Means</span></div>
                                </div>
                            -->
                            <!-- LAYER NR. 2 -->
                            <!--
                            <div class="tp-caption WebProduct-SubTitle   tp-resizeme" id="slide-2940-layer-02" data-x="['left','left','left','left']" data-hoffset="['60','60','20','20']" data-y="['middle','middle','top','top']" data-voffset="['0','0','280','180']" data-fontsize="['55','55','55','45']" data-lineheight="['75','75','75','75']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1250,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12; 
                                white-space: nowrap;
                                text-transform:uppercase;
                                font-weight: 700;
                                ">
                                <div class="text-secondrys">
                                    <span class="text-primarys">Healthy</span> You
                                </div>
                                </div>
                        -->
                            <!-- LAYER NR. 3 -->
                           <!-- <div class="tp-caption WebProduct-Content   tp-resizeme" id="slide-2940-layer-03" data-x="['left','left','left','left']" data-hoffset="['60','60','20','20']" data-y="['middle','middle','top','top']" data-voffset="['80','80','380','250']" data-fontsize="['21','21','24','18']" data-lineheight="['28','28','32','26']" data-width="['700','700','700','300']" data-height="['none','none','76','68']" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1500,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13; white-space: normal;text-transform:lowercase;">
                                <div class="text-secondrys"> Welcome to beauty lab, where you can relax and enjoy life. A little peace in a crazy world goes a long way.</div>
                                </div>
                    
                           
                                                           
                        </li>  
                        -->                                              
                    </ul>
                        
                </div>
            </div>
            <!-- SLIDER END -->
            
                        <!-- OUR EXPERTS SECTION START  -->
            <div class="section-full bg-white p-tb80">
                <div class="container">
                    <div class="section-content wt-our-team">
                    <div class="row">
                        
                            
                            <div class="col-md-4 col-sm-4 p-tb15">
                                <div class="wt-team-one bg-white">
                                    <div class="wt-team-media">
                                    @if($leftBanner->banner_link !== null)
                                        <a href="{{$leftBanner->banner_link}}">
                                    @else
                                        <a href="javascript:void(0);">
                                    @endif
                                    @if($leftBanner->banner_path !== null)
                                        <img src="{{asset('storage/public/banner/'.$leftBanner->banner_path)}}" class="leftBanner" alt="" ></a>
                                    @else
                                        <img src="{{asset('website\images\our-experts\1.jpeg')}}" class="leftBanner" alt=""></a>
                                    @endif
                                    </div>
                                    <div class="wt-team-info text-center bg-white p-a10">
                                        
                                       
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-4 col-sm-4 p-tb15">
                                <div class="wt-team-one bg-white">
                                    <div class="wt-team-media">
                                       @if($topBanner->banner_link !== null)
                                        <a href="{{$topBanner->banner_link}}">
                                        @else
                                        <a href="javascript:void(0);">
                                        @endif
                                        @if($topBanner->banner_path !== null)
                                        <img src="{{asset('storage/public/banner/'.$topBanner->banner_path)}}" class="topBanner" alt="" ></a>
                                        @else
                                        <img src="{{asset('website\images\our-experts\5.jpeg')}}" class="topBanner" alt="" ></a>
                                        @endif
                                        @if($bottomBanner->banner_link !== null)
                                        <a href="{{$bottomBanner->banner_link}}"></a>
                                        @else
                                        <a href="javascript:void(0);"></a>
                                        @endif
                                        @if($bottomBanner->banner_path !== null)
                                       {{-- <img src="{{asset('storage/public/banner/'.$bottomBanner->banner_path)}}" class="bottomBanner"  alt="" >--}}
                                        <video class="bottomBanner" width="100%" height="auto" autoplay muted loop playsinline id="my_video" data-bgfit="cover"  data-bgposition="center center" controls="true">
                                            <source src="{{asset('storage/public/banner/'.$bottomBanner->banner_path)}}" type="video/mp4">
                                        </video>
                                        @else
                                        <img src="{{asset('website\images\our-experts\8.jpeg')}}" class="bottomBanner" alt=""  ></a>
                                        @endif
                                    </div>
                                    <div class="wt-team-info text-center bg-white p-a10">
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4 p-tb15">
                            <div class="wt-team-one bg-white">
                                    <div class="wt-team-media">
                                        @if($rightBanner->banner_link !== null)
                                         <a href="{{$rightBanner->banner_link}}">
                                        @else
                                        <a href="javascript:void(0);">
                                        @endif
                                         @if($rightBanner->banner_path !== null)
                                        <img src="{{asset('storage/public/banner/'.$rightBanner->banner_path)}}" class="righBanner" alt="" ></a>
                                        @else
                                        <img src="{{asset('website\images\our-experts\17.jpeg')}}" class="righBanner" alt="" ></a>
                                        @endif
                                    </div>
                                    <div class="wt-team-info text-center bg-white p-a10">
                                        
                                       
                                    </div>
                                </div>
                                </div>
                           
                            
                            
                        </div>
                            <!--<div class="row" id="row"> 
                                  <div class="column" id="column">
                                   
                                    <img src="{{asset('website\images\our-experts\1.jpeg')}}" style="width:100%;height: 100%">
                                   
                                  </div>
                                  <div class="column" id="column">
                                  
                                    <img src="{{asset('website\images\our-experts\5.jpeg')}}" style="width:100%;">
                                    <img src="{{asset('website\images\our-experts\8.jpeg')}}" style="width:100%;">
                                    
                                  </div>  
                                  <div class="column" id="column">
                                   
                                    <img src="{{asset('website\images\our-experts\5.jpeg')}}" style="width:100%;height:100%">
                                    
                                  </div>
 
                            </div>
                        -->
                    </div>
                </div>
            </div>
            <!-- OUR EXPERTS SECTION END  -->   
              
            <div class="section-full bg-white ">
                <div class="container">

                    <!-- IMAGE CAROUSEL START -->
                        
                        <!-- TITLE START -->
                     
                      
                        <!-- TITLE END -->
                        
                        <!-- CAROUSEL -->
                        <div class="section-content">
                            <div class=".section-head.no-margin text-center ">
                               <hr>  
                              <h3 class="text-uppercase" style="margin-top: -4%;">
                              <ul >
                                <li id="newPTitle">
                                    <a href="javascript:void(0)"><span class="text-primary" >New</span> Products</a>
                                     <div class="wt-separator-outer" id="new_act_sep" ><div class="wt-separator bg-primary"></div></div>
                                    
                                </li>    
                                <li id="topSTitle">
                                   <a href="javascript:void(0)"> <span class="text-primary" >Top</span> Sellers</a>
                                    <div class="wt-separator-outer" id="top_act_sep" style="display: none;"><div class="wt-separator bg-primary"></div></div>
                                </li>
                              </ul>
                                    </h3>
                              <span class="separator-left bg-primary"></span>
                              <span class="separator-right bg-primary"></span>
                            </div>
                            <div class="owl-carousel img-carousel  owl-btn-vertical-center" id="newProduct" >

                             @foreach($product as $products)
                                <!-- COLUMNS 1 -->
                                <div class="item" >
                                    <div class="blog-post blog-grid date-style-1">
                                        <a href="{{url('/category/'.$products->category->category_slug.'/'.$products->product_slug)}}">
                                            <img src="{{asset('storage/public/products/'.$products->default_image)}}" alt="" style="margin-bottom: 10px" id="mayLove">
                                            </a>
                                        <table>
                                            <tbody>
                                                
                                           
                                       
                                        
                                        <tr>
                                            
                                         <td >
                                                
                                            <div class="wt-post-title " >
                                                <a href="{{url('/category/'.$products->category->category_slug.'/'.$products->product_slug)}}" style="white-space: nowrap;">{{$products-> name}}</a>
                                            </div>
                                            </td>
                                        </tr>
                                            <tr>
                                            
                                         <td >
                                            <span class="price">
                                        @if($products->offer !== '0')
                                           
                                                 <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px; text-decoration: line-through; "><span class="Price-currencySymbol">EGP</span>{{$products->price}}</span><div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                                        
                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $products->id }}" > <span class="fa fa-cart-plus"></span></button>
                                        
                                        </form>
                                                </div><br>
                                            
                                           

                                              
                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  "><span style="font-size: 1em;color:#ee001c !important; ">Special Price </span>EGP {{$products->offer}}</span>
                                               
                                            @else
                                               
                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  ">EGP {{$products->price}}</span> <div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                                        
                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $products->id }}" > <span class="fa fa-cart-plus" ></span></button>
                                        
                                        </form>
                                                </div>
                                               
                                            @endif
                                        </span>
                                              </td>
                                        </tr>
                                         
                                       {{--  <!--<tr>
                                            
                                         <td>
                                                <div class="wt-post-readmore pull-center">
                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                                        
                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $products->id }}"> <span class="fa fa-cart-plus"></span></button>
                                        
                                        </form>
                                                </div>
                                                </td>
                                                </tr>-->
                                           --}}
                                                </tbody>
                                             </table>
                                        </div>
                                    </div>
                               
                                
                             @endforeach   
                            </div>
                                          <div class="owl-carousel img-carousel  owl-btn-vertical-center" id="topSeller" style="display: none">
                              @foreach($topSeller as $top)
                                <!-- COLUMNS 1 -->
                                <div class="item">
                                    <div class="blog-post blog-grid date-style-1">
                                       
                                            <img src="{{asset('storage/public/products/'.$top->default_image)}}" alt="" style="margin-bottom: 10px" id="mayLove">
                                       <table>
                                            <tbody>
                                                
                                           
                                       
                                        
                                        <tr>
                                            
                                         <td >
                                        
                                            <div class="wt-post-title " >
                                                <a href="{{url('/category/'.$top->category->category_slug.'/'.$top->product_slug)}}" style="white-space: nowrap;">{{$top-> name}}</a>
                                            </div>
                                              </td>
                                        </tr>
                         <tr>
                                            
                                         <td >
                                            <span class="price">
                                        @if($top->offer !== '0')
                                           
                                                 <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px; text-decoration: line-through; "><span class="Price-currencySymbol">EGP</span>{{$top->price}}</span><div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="product_id" value="{{ $top->id }}">
                                        
                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $top->id }}" > <span class="fa fa-cart-plus"></span></button>
                                        
                                        </form>
                                                </div><br>
                                            
                                           

                                              
                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  "><span style="font-size: 1em;color:#ee001c !important; ">Special Price </span>EGP {{$top->offer}}</span>
                                               
                                            @else
                                               
                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  ">EGP {{$top->price}}</span> <div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="product_id" value="{{ $top->id }}">
                                        
                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $top->id }}" > <span class="fa fa-cart-plus" ></span></button>
                                        
                                        </form>
                                                </div>
                                               
                                            @endif
                                        </span>
                                              </td>
                                        </tr>
                                         
                                       {{--  <!--<tr>
                                            
                                         <td>
                                                <div class="wt-post-readmore pull-center">
                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                                        
                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $products->id }}"> <span class="fa fa-cart-plus"></span></button>
                                        
                                        </form>
                                                </div>
                                                </td>
                                                </tr>-->
                                           --}}
                                                </tbody>
                                             </table>
                                        </div>
                                    </div>
                               
                                
                             @endforeach   
                            </div>
                        </div>
                    
                </div>
            </div>
   <!--<hr>     
          <div class="section-full bg-white p-t80 p-b50">
                <div class="container">

                  -->  <!-- IMAGE CAROUSEL START -->
                    
                        <!-- TITLE START -->
                       
                     <!--   <div class="section-head text-center p-tb50">
                              <h3 class="text-uppercase" id="news" class="tests"><span class="text-primary" >Top</span> Sellers</h3>
                              <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                              <span class="separator-left bg-primary"></span>
                              <span class="separator-right bg-primary"></span>
                            </div>
                        <br><br>
                        --><!-- TITLE END -->
                        
                        <!-- CAROUSEL -->
                        
                            
              <!--
                        </div>
                    
                </div> -->
            </div>


            
            <!-- OUR PRODUCT SECTION END  -->  
            <!-- CONTACT US SECTION END  -->         
            <div class="section-full ">
                <div class="container equal-wraper no-col-gap">
                       <div class="uspwrap">
                            <ul class="usplist">
                                <li><strong>Customer Support</strong><br>
                                {{$contact->number}}</li>

                                <li><strong>Delivery Service</strong><br>
                                We Delivery Anywhere</li>

                                <li><strong>Refund Period</strong><br>
                                Within 14 days</li>

                                <li><strong>Secure Ordering</strong><br>
                                SSL encrypted</li>
                            </ul>
                        </div>

                        <!-- TITLE START -->
            <hr>
               <!--         <div class="container">
        <div class="row">
            
            <div class="col-12 col-md-6 col-lg-3 p-0">
                <div class="banner-single">
                    <div class="panel">
                        <h3 class="fa fa-truck"></h3>
                        <div class="block">
                            <h4 class="title"></h4>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 p-0">
                <div class="banner-single">
                    <div class="panel">
                        <h3 class="fa fa-money"></h3>
                        <div class="block">
                            <h4 class="title"></h4>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 p-0">
                <div class="banner-single second-last">
                    <div class="panel">
                        <h3 class="fa fa-life-ring"></h3>
                        <div class="block">
                            <h4 class="title"></h4>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 p-0">
                <div class="banner-single last">
                    <div class="panel">
                        <h3 class="fa fa-credit-card"></h3>
                        <div class="block">
                            <h4 class="title"></h4>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>-->

                        <!-- TITLE END -->   
  @if(session()->has('success'))
    <div class="alert alert-dismissable alert-success fade show" >
        <button type="button" class="close" data-dismiss='alert' aria-label='close'>
            <span aria-hidden='true' >&times;</span>
        </button>
        <strong style="text-align: center;">
            {{session()->get('success')}}
        </strong>
    </div>
    @endif   
                        <div class="row conntact-home" style="background-image:url({{asset('website/images/background/15.png')}});">
                            

          
                            <div class="col-md-12 col-sm-12">
                                <div class="section-content ">
                                      <div class="contact-home-right p-a30">
                                        <h5 class="text-uppercase font-26 p-b20 font-weight-400" style="color: white">GET IN TOUCH</h5>
                                        <form  method="post" action="{{route('contact.submit')}}">
                                        {{csrf_field()}}
                                                                            {{method_field('POST')}}

                                            <div class="form-group col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input name="name" type="text" required="" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                    <input name="email" type="email" class="form-control" required="" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                    <input name="subject" type="text" class="form-control" required="" placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon v-align-t"><i class="fa fa-pencil"></i></span>
                                                    <textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                              <div class="form-group col-md-8 col-sm-12">
                                            <button type="submit" class="site-button skew-icon-btn radius-sm">
                                              <span class="font-weight-700 inline-block text-uppercase p-lr15">Submit</span> 
                                            </button>
                                            </div>
                                        </form>
                                      </div>                             
                                </div>
                            </div>
                        </div>
                    
                </div>
                
            </div> 
            <!-- CONTACT US OFFER SECTION END  -->

        <!-- CONTENT END -->
        <footer class="site-footer footer-dark">
@endsection('content')