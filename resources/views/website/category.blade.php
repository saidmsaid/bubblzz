@extends('website.website',['title' => $current->name])

@section('content')
<!-- CONTENT START -->
        <div class="page-content">
        
            <!-- INNER PAGE BANNER -->
          
            <!-- INNER PAGE BANNER END -->
            
            <!-- BREADCRUMB ROW -->                            
            <div class="bg-gray-light p-tb20">
            	<div class="container">
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li>{{$current->name}}</li>
                    </ul>
                </div>
            </div>
            <!-- BREADCRUMB ROW END -->
            
            <!-- SECTION CONTENT START -->
            <div /*class="section-full p-t80 p-b50"*/ class="section-full ">
                <div class="container">
                    <div class="section-content">
                    	<div class="row">
                             <!-- SIDE BAR START -->
                            <!--<div class="col-md-3">
                            
                                <aside class="side-bar">
                                -->    
                                        <!-- 13. SEARCH -->
                                   <!--     <div class="widget bg-white ">
                                            <h4 class="widget-title">Search</h4>
                                            <div class="search-bx">
                                                <form role="search" method="post">
                                                    <div class="input-group">
                                                        <input name="news-letter" type="text" class="form-control" placeholder="Write your text">
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="site-button"><i class="fa fa-search"></i></button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>                                

                                     -->
                                                                                                            
                                        <!-- 12. TAGS -->
                                        <!--<div class="widget bg-white  widget_tag_cloud">
                                            <h4 class="widget-title">Tags</h4>
                                            <div class="tagcloud">
                                                <a href="javascript:void(0);">Newbies </a>
                                                <a href="javascript:void(0);">Bath Blasters</a>
                                                <a href="javascript:void(0);">Blaster Cards</a>
                                                <a href="javascript:void(0);">Bath Melts</a>
                                                <a href="javascript:void(0);">Handmade Soaps</a>
                                                <a href="javascript:void(0);">Newbies </a>
                                                <a href="javascript:void(0);">Bath Blasters</a>
                                                <a href="javascript:void(0);">Blaster Cards</a>
                                                <a href="javascript:void(0);">Bath Melts</a>
                                                <a href="javascript:void(0);">Newbies </a>
                                                <a href="javascript:void(0);">Handmade Soaps</a>
                                                
                                            </div>
                                        </div> 
                                    
                                   </aside>
        
                            </div>-->
                            <!-- SIDE BAR END --> 
                            <div class="col-md-12">                   
                                <!-- TITLE START -->
                                <div class="p-b10">
                                    {{--<h3 class="text-uppercase">{{$current->name}}</h3>--}}
                                    @if($current->image !== "noImage.png")
                                        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('storage/public/categories/'.$current->image)}});margin-top: 2%;">
                                        {{--<div class="overlay-main bg-black opacity-02"></div>--}}
                                        </div>
                                    @else
                                        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('storage/public/categories/noImage.png')}});margin-top: 2%;">
                                        {{--<div class="overlay-main bg-black opacity-02"></div></div>--}}
                                    @endif
                                </div>
                                    <!--<div class="wt-separator-outer m-b30">
                                        <div class="wt-separator style-icon">
                                          
                                            <span class="separator-left bg-primary"></span>
                                            <span class="separator-right bg-primary"></span>
                                        </div>                            
                                    </div>-->
                               
                                <!-- TITLE END -->
                                
                                <div class="row">
                                    <!-- COLUMNS 1 -->
                                    @foreach($products as $product)
                                    <div class="col-md-3 col-sm-3 col-xs-6 col-xs-100pc m-b30">
                                        @if($product->sold !== 0)
                                        <div class="price-tag">
                                        	<div class="price-circle bg-white text-center text-primary radius-bx">
                                            	<span class="font-18">Sold Out</span>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="wt-box wt-product-box">
                                            <div>
                                                 <a href="{{url('/category/'.$product->category->category_slug.'/'.$product->product_slug)}}" style="color: #888;white-space: nowrap;font-size: 14px"> <img src="{{asset('storage/public/products/'.$product->default_image)}}" alt="" style="border-style: none;vertical-align: middle;width: 100%;" id="catimg" ></a>
                                               <!-- <div class="overlay-bx">
                                                    <div class="overlay-icon">
                                                        <a href="javascript:void(0);">
                                                            <i class="fa fa-cart-plus wt-icon-box-xs"></i>
                                                        </a>
                                                      
                                                        <a class="mfp-link" href="javascript:void(0);">
                                                            <i class="fa fa-heart wt-icon-box-xs"></i>
                                                        </a>
                                                  </div>
                                                </div>-->
                                            </div>
                                            <div class="wt-info  text-left">
                                                 <div class="p-a10 bg-white" style="text-align: left;">
                                                    <h4 class="wt-title" style="font-size: 1.15em;">
                                                        <a href="{{url('/category/'.$product->category->category_slug.'/'.$product->product_slug)}}" style="color: #888;white-space: nowrap;font-size: 14px">{{$product-> name}}  </a>
                                                    </h4>
                                                   <!-- <span class="price" style="color: #888;font-weight: 800;text-align: left;">
                                                        @if($product->offer !== '0')
                                                            <del>
                                                                 <span><span class="Price-currencySymbol">EGP</span>{{$product->price}}</span>
                                                            </del> 
                                                           

                                                                <ins>
                                                                    <span>EGP {{$product->offer}}</span>
                                                                </ins>
                                                            @else
                                                                <ins>
                                                                    <span style="font-size: 16px;color: #111111;font-weight: 600;">EGP {{$product->price}}</span>
                                                                </ins>
                                                            @endif
                                                    </span>
                                                  
                                                    <div class="p-t10">
                                                        <form action="{{Route('cart.store')}}" method="POST" id="cart">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="POST">
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        
                                                            <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $product->id }}"> Add to Cart</button>
                                                        
                                                        </form>
                                                    </div>-->
                                                     <span class="price">
                                                        @if($product->offer !== '0')
                                                           
                                                                 <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px; text-decoration: line-through; "><span class="Price-currencySymbol">EGP</span>{{$product->price}}</span><div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                                      @if($product->sold !== 1)
                                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        
                                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md"  id="add_product" data-id="{{ $product->id }}" style="display: flex;"   @if($product->sold !== 0) {{'disabled'}} @endif > <span class="fa fa-cart-plus"></span></button>
                                                        
                                                        </form>
                                                        @endif
                                                                </div><br>
                                                            
                                                           

                                                              
                                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  "><span style="font-size: 1em;color:#f24e97 !important; ">Special Price </span><br>EGP {{$product->offer}}</span>
                                                               
                                                            @else
                                                               
                                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  ">EGP {{$product->price}}</span> <div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        
                                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $product->id }}" style="display: flex;"    @if($product->sold !== 0) {{'disabled'}} @endif > <span class="fa fa-cart-plus" ></span></button>
                                                        
                                                        </form>
                                                                </div>
                                                               
                                                            @endif
                                                        </span>
                                                    
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                  
                                   @if($products->render())
                                        
                                       <div class="col-md-12 product-render" style="text-align: center;"> {{$products->render()}}</div>
                                  @endif
                                    
                                    

                                </div>
                                
                               
                                
                                <!-- TITLE START -->
                              {{--  <div class="p-b10">
                                    <h3 class="text-uppercase">Featured products</h3>
                                    <div class="wt-separator-outer  m-b30">
                                        <div class="wt-separator style-icon">
                                           
                                            <span class="separator-left bg-primary"></span>
                                            <span class="separator-right bg-primary"></span>
                                        </div>                            
                                    </div>
                                </div>--}}
                                <!-- TITLE END -->
                            {{--
                                <div class="row">
                                
                                    <!-- COLUMNS 1 -->
                                    @foreach($featured as $featured)
                                    <div class="col-md-3 col-sm-4 col-xs-6 col-xs-100pc m-b30">
                                        <div class="wt-box wt-product-box">
                                             <a href="{{url('/product_detail/'.$featured->id)}}"><div >
                                                <img src="{{asset('storage/public/products/'.$featured->default_image)}}" alt="" id="catimg" >
                                               <!-- <div class="overlay-bx">
                                                    <div class="overlay-icon">
                                                        <a href="javascript:void(0);">
                                                            <i class="fa fa-cart-plus wt-icon-box-xs"></i>
                                                        </a>
                                                        <a class="mfp-link" href="javascript:void(0);">
                                                            <i class="fa fa-heart wt-icon-box-xs"></i>
                                                        </a>
                                                    </div>
                                                </div>-->
                                            </div></a>
                                            <div class="wt-info  text-left">
                                                 <div class="p-a10 bg-white">
                                                    <h4 class="wt-title">
                                                        <a href="{{url('/product_detail/'.$featured->id)}}" style="color: #888;white-space: nowrap;font-size: 14px">{{$featured-> name}}</a>
                                                    </h4>
                                                        <span class="price">
                                                        @if($featured->offer !== '0')
                                                           
                                                                 <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px; text-decoration: line-through; "><span class="Price-currencySymbol">EGP</span>{{$featured->price}}</span><div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="product_id" value="{{ $featured->id }}">
                                                        
                                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $featured->id }}" style="display: flex;"> <span class="fa fa-cart-plus"></span></button>
                                                        
                                                        </form>
                                                                </div><br>
                                                            
                                                           

                                                              
                                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  "><span style="font-size: 1em;color:#f24e97 !important; ">Special Price </span>EGP {{$featured->offer}}</span>
                                                               
                                                            @else
                                                               
                                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  ">EGP {{$featured->price}}</span> <div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="product_id" value="{{ $featured->id }}">
                                                        
                                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $featured->id }}" style="display: flex;"> <span class="fa fa-cart-plus" ></span></button>
                                                        
                                                        </form>
                                                                </div>
                                                               
                                                            @endif
                                                        </span>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                            
                                   
                                </div>--}}
                            </div>
                            {{--<div class="col-md-3">
                            
                                <aside class="side-bar" style="margin-top:50%">
                                
                                   
                                   
                                    <div class="widget">
                                        @if($current->image !== "noImage.png")
                                        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('storage/public/categories/'.$current->image)}});height: 580px;background-repeat: no-repeat;background-size: cover;">
                                      
                                        </div>
                                    @else
                                        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('storage/public/categories/noImage.png')}});height: 580px;background-repeat: no-repeat;background-size: cover;">
                                        
                                    @endif
                                    </div> 
                                    
                                
                               </aside>
        
                            </div>
                       </div>--}} 
                       
                   </div>
                 </div>
             </div>
             <!-- SECTION CONTENT END -->
        
        </div>
        <!-- CONTENT END -->
        
        <!-- FOOTER START -->
        <footer class="site-footer footer-dark" >
            <!-- COLL-TO ACTION START -->
            
@endsection('content')