@extends('website.website',['title' => $current->name])

@section('content')
<!-- CONTENT START -->
        <div class="page-content">
        
            <!-- INNER PAGE BANNER -->
            <!--<div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('storage/public/products/'.$current->default_image)}});">
            	<div class="overlay-main bg-black opacity-07"></div>
                <div class="container">
                    <div class="wt-bnr-inr-entry">
                        <h1 class="text-white">{{$current->name}}</h1>
                    </div>
                </div>
            </div>-->
            <!-- INNER PAGE BANNER END -->
            
            <!-- BREADCRUMB ROW -->                            
            <div class="bg-gray-light p-tb20">
            	<div class="container">
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="{{url('/category/'.$currentCategory->id)}}">{{$currentCategory->name}}</a></li>
                        <li>{{$current->name}}</li>
                    </ul>
                </div>
            </div>
            <!-- BREADCRUMB ROW END -->                   
            
            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">
            
				<!-- PRODUCT DETAILS -->
            	<div class="container woo-entry">
                
                	<div class="row m-b30">
                    
							<div class="col-md-4 col-sm-4 m-b30">
								<div class="wt-box wt-product-gallery on-show-slider"> 
                                
                                    <div id="sync1" class="owl-carousel owl-theme owl-btn-vertical-center m-b5">
                                        <div class="item">
                                        	<div class="mfp-gallery">
                                                <div class="wt-box">
                                                    <div class="wt-thum-bx wt-img-overlay1 ">
                                                        <img src="{{asset('storage/public/products/'.$current->default_image)}}" alt="">
                                                        <div class="overlay-bx">
                                                            <div class="overlay-icon">
                                                                <a class="mfp-link" href="{{asset('storage/public/products/'.$current->default_image)}}">
                                                                    <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                                                </a>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach($image as $images)
                                        <div class="item">
                                            <div class="mfp-gallery">
                                                <div class="wt-box">
                                                    <div class="wt-thum-bx wt-img-overlay1 ">
                                                        <img src="{{asset('storage/public/products/'.$images->image_name)}}" alt="">
                                                        <div class="overlay-bx">
                                                            <div class="overlay-icon">
                                                                <a class="mfp-link" href="{{asset('storage/public/products/'.$images->image_name)}}">
                                                                    <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                                                </a>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        
                                    </div>
                                    
                                 <div id="sync2" class="owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="wt-media">
                                                <img src="{{asset('storage/public/products/'.$current->default_image)}}" alt="">
                                            </div>
                                        </div>
                                       @foreach($image as $images)
                                        <div class="item">
                                            <div class="wt-media">
                                                <img src="{{asset('storage/public/products/'.$images->image_name)}}" alt="">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
							</div>
                            
							<div class="col-md-8 col-sm-8 p-b30">
                            @if ($errors->has('message'))
                                 <div class="alert alert-danger">
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="font-weight: 400">{!! $errors->first('message') !!}</strong>
                                        </span>
                                 </div>
                            @endif

								<div class="wt-post-title " style="margin-left: 2%">
									<h3 class="post-title" style="color:#ff65ad"><a href="javascript:void(0);" style="color: #ff65ad">{{$current->name}}</a>@if($current->sold !== 0) ( Temporarily out of stock ) @endif</h3>
								</div>
                                @if($creview['rate'] !== null)
                                <span class="rating-bx" style="margin-left: 2%">
                                
                                  @for($i=1;$i<=$creview['rate'];$i++)
                                      <i class="fa fa-star"></i>
                                       @if($i ==$creview['rate'])
                                        @if(5 - $creview['rate'] !==0)
                                            @for($i=1;$i <= 5-$creview['rate'];$i++)
                                            <i class="fa fa-star-o" data-alt="4" title="regular"></i>
                                            @endfor
                                        @endif
                                    @endif
                                  @endfor
                                  <a id="review_this">Review this product </a> 
                                </span>
                                @else
                                 <span class="rating-bx" style="margin-left: 2%">
                                  <i class="fa fa-star-o" data-alt="4" title="regular"></i> <i class="fa fa-star-o" data-alt="4" title="regular"></i> <i class="fa fa-star-o" data-alt="4" title="regular"></i> <i class="fa fa-star-o" data-alt="4" title="regular"></i> <i class="fa fa-star-o" data-alt="4" title="regular"></i>
                                  <a id="review_this">Review this product </a> 
                                 {{--<span> Review this product</span>--}}
                                @endif   
                                </span>
                                @if($current->offer !== '0')
                                <h2 class="m-tb10" style="color: #ff65ad;text-decoration-line: line-through;margin-left: 2%"><small>EGP {{$current->price}}</small> </h2>
                                <h3 class="m-tb10" style="color: #f24e97;font-weight: bold;margin-left: 2%">Special Price <small>EGP {{$current->offer}}</small> </h3>

                                @else
                                <h2 class="m-tb10" style="color: #ff65ad;font-weight: bold;margin-left: 2%"><small>EGP  {{$current->price}}</small> </h2>
                                @endif
								<div class="wt-post-text" style="margin-left: 2%">
									<p class="m-b10">{{$current->small_description}}</p> 
								</div>
								
								
                             <!--   <form action="{{Route('cart.store')}}" method="POST" id="cart" style="margin-left: 2%;display: inline-block;">-->
                                <form action="{{Route('cart.store')}}" method="POST" /*id="cart"*/ style="margin-left: 2%;display: inline-block;">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                   <!-- <div class="quantity btn-quantity pull-left m-r10">
                                        <input id="demo_vertical2" type="text" value="1" name="demo_vertical2">
                                    </div>-->
                                    <div class="quantity btn-quantity pull-left m-r10">
                                        <input id="demo_vertical2" type="text" value="1" name="demo_vertical2">
                                    </div>
                                           
                                            <input type="hidden" name="product_id" value="{{ $current->id }}">
                                           
                                            <button class="site-button text-uppercase radius-sm font-weight-700 button-md" /*id="add_product"*/ data-id="{{ $current->id }}" > <span class="fa fa-cart-plus"></span></button>
                                           

                                        </form>
                                <form action="{{Route('wishlist.store')}}" method="POST" id="watchlist" style="margin-left: 1%;display: inline-block;">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                   <!-- <div class="quantity btn-quantity pull-left m-r10">
                                        <input id="demo_vertical2" type="text" value="1" name="demo_vertical2">
                                    </div>-->
                                    
                                            <input type="hidden" name="product_id" value="{{ $current->id }}">
                                            
                                         <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="watch_product" data-id="{{ $current->id }}" >  <span class="fa fa-heart"></span></button>
                                         </form>
                                         @if(session()->has('error'))
    <div class="alert alert-dismissable alert-danger fade show">
        <button type="button" class="close" data-dismiss='alert' aria-label='close'>
            <span aria-hidden='true' >&times;</span>
        </button>
        <strong>
            {!!session()->get('error')!!}
        </strong>
    </div>
    @endif
                                        <div class="col-md-12 p-b30" style="margin-top: 5%">
                            <div class="wt-tabs border border-top bg-tabs">
                                <ul class="nav nav-tabs" style="padding-left: 0px">
                                    <li class="active"><a data-toggle="tab" href="#web-design-19">Description</a></li>
                                    <li><a data-toggle="tab" href="#directions">Directions </a></li>
                                    <li><a data-toggle="tab" href="#ingredients">Ingredients </a></li>
                                    <li><a data-toggle="tab" href="#developement-19" id="our_reviews">Reviews </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="web-design-19" class="tab-pane active">
                                        <div class=" p-a10">
                                            <p class="m-b10">{{$current->full_description }}</p>
                                            
                                        </div>
                                    </div>
                                    <div id="directions" class="tab-pane">
                                        <div class=" p-a10">
                                            <p class="m-b10">{{$current->product_directions }}</p>
                                            
                                        </div>
                                    </div>
                                    <div id="ingredients" class="tab-pane">
                                        <div class=" p-a10">
                                            <p class="m-b10">{{$current->product_Ingredients }}</p>
                                            
                                        </div>
                                    </div>
                                    <div id="developement-19" class="tab-pane">
                                        <div class=" p-a10">
                                            <div id="comments">
                                                <ol class="commentlist">
                                                @foreach($review as $rev)
                                                    <li class="comment">
                                                        <div class="comment_container">
                                                            <img class="avatar avatar-60 photo" src="{{asset('website\images\client.png')}}" alt="">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                                    <div data-rating='3'>
                                                                    @for($i=1;$i<=$rev->rate;$i++)
                                                                        <i class="fa fa-star" data-alt="{{$i}}" title="regular"></i>
                                                                        @if($i ==$rev->rate)
                                                                            @if(5 - $rev->rate !==0)
                                                                                @for($i=1;$i <= 5-$rev->rate;$i++)
                                                                                <i class="fa fa-star-o" data-alt="4" title="regular"></i>
                                                                                @endfor
                                                                            @endif
                                                                        @endif
                                                                    @endfor

                                                                    
                                                                    </div>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong class="author">{{$rev->name}}</strong>
                                                                    <span><i class="fa fa-clock-o"></i> {{date("Y/m/d",strtotime($rev->created_at)) }}</span>
                                                                </p>
                                                                <div class="description">
                                                                    <p>{{$rev->body}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    
                                                </ol>
                                            </div>
                                            <div id="review_form_wrapper">
                                                <div id="review_form">
                                                        <div id="respond" class="comment-respond">                                              
                                                           
                                                            <form class="comment-form" method="post" action="{{url('/review')}}" > 
                                                                {{csrf_field()}}
                                                              
                                                                <input type="hidden" name="commentable_id" value="{{$current->id}}" required="required">
                                                                               <span class="help-block" style="font-weight: 600;color: #f24e97"> @if ($errors->has('commentable_id'))
                                                                         * {{ $errors->first('commentable_id') }}
                                                                        @endif
                                                                      </span>                                       
                                                                <div class="comment-form-rating">
                                                                    <label>Your Rating</label>
                                                                    <div class='star-Rating-input'>
                                                                        <input type="radio" name="rate" value="1" style="opacity: unset;width: auto;margin-right: 7px;" required="required"><span class="radio-val">1</span>
                                                                        <input type="radio" name="rate" value="2" style="opacity: unset;width: auto;margin-right: 7px;" required="required"><span class="radio-val">2</span>
                                                                        <input type="radio" name="rate" value="3" style="opacity: unset;width: auto;margin-right: 7px;" required="required"><span class="radio-val">3</span>
                                                                        <input type="radio" name="rate" value="4" style="opacity: unset;width: auto;margin-right: 7px;" required="required"><span class="radio-val">4</span>
                                                                        <input type="radio" name="rate" value="5" style="opacity: unset;width: auto;margin-right: 7px;" required="required"><span class="radio-val">5</span>
                                                                    </div>
                                                                    <span class="help-block" style="font-weight: 600;color: #f24e97"> @if ($errors->has('rate'))
                                                                         * {{ $errors->first('rate') }}
                                                                      @endif
                                                                    </span>
                                                                </div>    
                                                                 <div class="comment-form-comment">
                                                                    <label>Your Name</label>
                                                                    <input type="text" name="name" required="required">
                                                                     <span class="help-block" style="font-weight: 600;color: #f24e97"> @if ($errors->has('name'))
                                                                         * {{ $errors->first('name') }}
                                                                        @endif
                                                                      </span>
                                                                </div>
                                                                <div class="comment-form-comment">
                                                                    <label>Your Review</label>
                                                                    <textarea aria-required="true" rows="8" cols="45" name="body" id="comment" required="required"></textarea>
                                                                    <span class="help-block" style="font-weight: 600;color: #f24e97"> @if ($errors->has('body'))
                                                                         * {{ $errors->first('body') }}
                                                                        @endif
                                                                      </span>
                                                                </div>
                                                                <div class="form-submit">                                                       
                                                                    <button class="site-button  m-r15" type="submit" id="reviewsubmit">Add </button>
                                                                </div>                                                  
                                                            </form> 
                                                             <p ><strong  id="successNew"></strong></p>
                                                                                                           
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>  
                                    </div>

                                </div>
                            </div>
                        </div>
							</div>

                    </div>
                    
                                           
                    <!-- TABS CONTENT START -->
					<!--<div class="row">
						<div class="col-md-12 p-b30">
							<div class="wt-tabs border border-top bg-tabs">
                                <ul class="nav nav-tabs" style="padding-left: 0px">
                                    <li class="active"><a data-toggle="tab" href="#web-design-19">Description</a></li>
                                    
                                    <li><a data-toggle="tab" href="#developement-19">Review </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="web-design-19" class="tab-pane active">
                                        <div class=" p-a10">
                                            <p class="m-b10">{{$current->full_description }}</p>
                                            
                                        </div>
                                    </div>
                                  
                                    <div id="developement-19" class="tab-pane">
                                        <div class=" p-a10">
                                            <div id="comments">
                                                <ol class="commentlist">
                                                @foreach($review as $rev)
                                                    <li class="comment">
                                                        <div class="comment_container">
                                                            <img class="avatar avatar-60 photo" src="{{asset('website\images\testimonials\pic1.jpeg')}}" alt="">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                                    <div data-rating='3'>
                                                                    @for($i=1;$i<=$rev->rate;$i++)
                                                                        <i class="fa fa-star" data-alt="{{$i}}" title="regular"></i>
                                                                        @if($i ==$rev->rate)
                                                                            @if(5 - $rev->rate !==0)
                                                                                @for($i=1;$i <= 5-$rev->rate;$i++)
                                                                                <i class="fa fa-star-o" data-alt="4" title="regular"></i>
                                                                                @endfor
                                                                            @endif
                                                                        @endif
                                                                    @endfor

                                                                    
                                                                    </div>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong class="author">{{$rev->name}}</strong>
                                                                    <span><i class="fa fa-clock-o"></i> {{date("Y/m/d",strtotime($rev->created_at)) }}</span>
                                                                </p>
                                                                <div class="description">
                                                                    <p>{{$rev->body}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    
                                                </ol>
                                            </div>
                                            <div id="review_form_wrapper">
                                                <div id="review_form">
                                                        <div id="respond" class="comment-respond">                                              
                                                            <h3 class="comment-reply-title" id="reply-title">Add a review</h3> 

                                                             @guest 
                                                                <h4>Your Review Important For Us ,Login Or Register To Enter Your Review</h4>
                                                                <div type="submit" class="site-button skew-icon-btn radius-sm" >
                                                                     <a href="{{url('/login')}}" style="color: white" class="font-weight-700 inline-block text-uppercase p-lr15">
                                                                     Login
                                                                    </a>
                                                                </div>
                                                                <div type="submit" class="site-button skew-icon-btn radius-sm" >
                                                                     <a href="{{url('/register')}}" style="color: white" class="font-weight-700 inline-block text-uppercase p-lr15">
                                                                      Create an Account
                                                                    </a>
                                                                </div>
                                                             @else
                                                            <form class="comment-form" method="post" action="{{url('/review')}}" id="reviewform"> 
                                                                {{csrf_field()}}
                                                               <input type="hidden" name="commentable_type" value="App\Product">
                                                                <input type="hidden" name="commentable_id" value="{{$current->id}}">
                                                                                                                     
                                                                <div class="comment-form-rating">
                                                                    <label>Your Rating</label>
                                                                    <div class='star-Rating-input'>
                                                                        <input type="radio" name="rate" value="1" style="opacity: unset;width: auto;margin-right: 7px;"><span class="radio-val">1</span>
                                                                        <input type="radio" name="rate" value="2" style="opacity: unset;width: auto;margin-right: 7px;"><span class="radio-val">2</span>
                                                                        <input type="radio" name="rate" value="3" style="opacity: unset;width: auto;margin-right: 7px;"><span class="radio-val">3</span>
                                                                        <input type="radio" name="rate" value="4" style="opacity: unset;width: auto;margin-right: 7px;"><span class="radio-val">4</span>
                                                                        <input type="radio" name="rate" value="5" style="opacity: unset;width: auto;margin-right: 7px;"><span class="radio-val">5</span>
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="comment-form-comment">
                                                                    <label>Your Review</label>
                                                                    <textarea aria-required="true" rows="8" cols="45" name="body" id="comment"></textarea>
                                                                </div>
                                                                <div class="form-submit">                                                       
                                                                    <button class="site-button  m-r15" type="submit" id="reviewsubmit">Add <i class="fa fa-angle-double-right"></i></button>
                                                                </div>                                                  
                                                            </form> 
                                                             <p ><strong  id="successNew"></strong></p>
                                                            @endguest                                                
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>  
                                    </div>

                                </div>
                            </div>
						</div>
					</div>-->
                    <!-- TABS CONTENT START -->
                    
                     <!-- TITLE START -->
                        <div class="p-b10">
                            <h3 class="text-uppercase" style="  width: 100%; 
   text-align: center; 
   border-bottom: 1px solid #f1f1f1; 
   line-height: 0.1em;
   margin: 10px 0 20px; "><span style=" background:#fff; 
    padding:0 10px;color:#f24e97"> You may also like </span></h3>

                         <!--   <div class="wt-separator-outer  m-b30">
                                <div class="wt-separator style-icon">
                                    <i class="fa fa-leaf text-black"></i>
                                    <span class="separator-left bg-primary"></span>
                                    <span class="separator-right bg-primary"></span>
                                </div>                            
                            </div>-->
                        </div><br>
                    <!-- TITLE END -->
                    
                    <div class="row m-b30">
                
                        <!-- COLUMNS 1 -->
                        @foreach($special as $special)
                        <div class="col-md-3 col-sm-4 col-xs-6 col-xs-100pc m-b30">
                            <div class="wt-box wt-product-box">
                            <a href="{{url('/'.$special->category->category_slug.'/'.$special->product_slug)}}" style="color: #888;white-space: nowrap;font-size: 14px">
                                <div class="">
                                    <img src="{{asset('storage/public/products/'.$special->default_image)}}" alt="" >
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
                                </a>
                                <div class="wt-info  text-left">
                                     <div class="p-a10 bg-white">
                                         <h4 class="wt-title" style="font-size: 1.15em;">
                                                        <a href="{{url('/'.$special->category->category_slug.'/'.$special->product_slug)}}" style="color: #888;white-space: nowrap;font-size: 14px">{{$special-> name}}</a>
                                                    </h4>
                                      <span class="price">
                                                        @if($special->offer !== '0')
                                                           
                                                                 <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px; text-decoration: line-through; "><span class="Price-currencySymbol">EGP</span>{{$special->price}}</span><div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="product_id" value="{{ $special->id }}">
                                                        
                                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $special->id }}" style="display: flex;"> <span class="fa fa-cart-plus"></span></button>
                                                        
                                                        </form>
                                                                </div><br>
                                                            
                                                           

                                                              
                                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  "><span style="font-size: 1em;color:#f24e97 !important; ">Special Price </span>EGP {{$special->offer}}</span>
                                                               
                                                            @else
                                                               
                                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  ">EGP {{$special->price}}</span> <div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="product_id" value="{{ $special->id }}">
                                                        
                                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $special->id }}" style="display: flex;"> <span class="fa fa-cart-plus" ></span></button>
                                                        
                                                        </form>
                                                                </div>
                                                               
                                                            @endif
                                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                   
 
                    
				</div>
				<!-- PRODUCT DETAILS -->	
                	
			</div>
            <!-- CONTENT CONTENT END -->
        
        
        </div>
        <!-- CONTENT END -->

        <!-- FOOTER START -->
        <footer class="site-footer footer-dark">
            <!-- COLL-TO ACTION START -->
           
@endsection('content')