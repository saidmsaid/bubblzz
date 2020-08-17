@extends('website.website')
@section('content')
   <!-- CONTENT START -->
        <div class="page-content">

                
            <!-- BREADCRUMB ROW -->                            
            <div class="bg-gray-light p-tb20">
                <div class="container">
                    <ul class="wt-breadcrumb breadcrumb-style-1">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
            <!-- BREADCRUMB  ROW END --> 
                
            <!-- OUR BEST SERVICES SECTION  START-->                  
            <div class="section-full text-center p-tb50">
                <div class="container">
                    
                    <div class="section-content">
                        <div class="p-b30">
                            <h3 class="text-uppercase">Wishlist</h3>
                            <div class="wt-separator-outer">
                               <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>                           
                            </div>
                        </div>
                        <div id="no-more-tables">
                            <table class="table borderless  table-condensed cf wt-responsive-table shopping-table">
                                <thead class="cf text-center ">
                                    <tr>
                                        <th style="width: 20%"></th>
                                        <th style="width: 40%;color:#f24e97">PRODUCT NAME</th>
                                        <th class="numeric" style="width: 15%;color:#f24e97">UNIT PRICE</th>
                                        <!--<th class="numeric">Quantity</th>-->
                                        <th class="numeric" style="width: 15%;color:#f24e97">Add To Cart</th>
                                        <th class="numeric" style="width: 10%;color:#f24e97">REMOVE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlist as $wish)
                                    <tr id="{{ $wish->id }}">
                                        <td data-title="IMAGE"><img src="{{asset('storage/public/products/'.$wish->product()->first()->default_image)}}" alt="" style="width: 100%"></td>
                                        <td data-title="PRODUCT NAME" style="text-align:left;vertical-align: middle;">{{$wish->product->first()->name}}</td>
                                        <td data-title="PRICE" class="numeric" style="text-align:left;vertical-align: middle;">EGP {{($wish->product()->first()->offer !== "0")?$wish->product()->first()->offer:$wish->product()->first()->price}}</td>
                                      <!--  <td data-title="Quantity" class="numeric">
                                        
                                        <form action="{{route('cart.update',$wish->id)}}" method="post" id="quantityUpd">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <select id="quantityUp">
                                            @for($i=1;$i<=50;$i++)
                                            
                                                  <option value="{{$i}}" {{ $i == $wish->quantity ? 'selected="selected"' : '' }} data-id="{{$wish->id}}">{{$i}}</option>
                                            @endfor    
                                            </select>
                                        </form>

                                        </td>-->
                                        <td data-title="Add To Cart"  class="numeric" style="text-align:left;vertical-align: middle;">
                                            <form action="{{Route('cart.store')}}" method="POST" id="cart" style="margin-left: 2%;display: inline-block;">
                                            {{csrf_field()}}
                                            {{method_field('post')}}
                                               <!-- <div class="quantity btn-quantity pull-left m-r10">
                                                    <input id="demo_vertical2" type="text" value="1" name="demo_vertical2">
                                                </div>-->
                                    
                                           
                                            <input type="hidden" name="product_id" value="{{ $wish->product->first()->id }}">
                                           
                                            <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $wish->product->first()->id }}" > <span class="fa fa-cart-plus"></span></button>
                                           

                                        </form>
                                        </td>
                                        <td data-title="REMOVE" class="numeric" style="text-align:left;vertical-align: middle;">
                                        <form action="{{route('wishlist.destroy',$wish->id)}}" method="post" id="delWish">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button   class="nav-cart-item-quantity" id="wishDel" data-id="{{ $wish->id }}" style="border:none;"><i class="fa fa-times"></i></button>
                                        </form>
                                        
                                        </td>
                                    </tr>
                                    @endforeach

                                    
    
                                </tbody>
                            </table>
                            <div class="cart-buttons text-right">
                                
                               
                                <a href="{{url('/')}}" class="m-b15 site-button text-uppercase">Continue Shopping</a>
                                
                               
                            </div>
                            
                        </div>
                	</div>

                </div>
            </div>
            <!-- OUR BEST SERVICES SECTION END -->

            <!-- SECTION CONTENT START -->
            <div class="section-full p-b50">
            
				<!-- PRODUCT DETAILS -->
            	<div class="container woo-entry">
                    <!-- TITLE START -->
                     <div class="p-b10">
                            <h3 class="text-uppercase">You may also like</h3>
                          
                    	</div>
                    <!-- TITLE END -->
                    <div class="row m-b30">
                        
                        	<!-- COLUMNS 1 -->
                           @foreach($featured as $featured)
                                    <div class="col-md-3 col-sm-4 col-xs-6 col-xs-100pc m-b30">
                                        <div class="wt-box wt-product-box">
                                             <a href="{{url('/category/'.$featured->category->category_slug.'/'.$featured->product_slug)}}"><div >
                                                <img src="{{asset('storage/public/products/'.$featured->default_image)}}" alt=""  >
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
                                                        <a href="{{url('/category/'.$featured->category->category_slug.'/'.$featured->product_slug)}}" style="color: #888;white-space: nowrap;font-size: 14px">{{$featured-> name}}</a>
                                                    </h4>
                                                        <span class="price">
                                                        @if($featured->offer !== '0')
                                                           
                                                                 <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px; text-decoration: line-through; "><span class="Price-currencySymbol">EGP </span>{{$featured->price}}</span><div class="wt-post-readmore pull-right" style="display: inline-block; ">
                                                                     <form action="{{Route('cart.store')}}" method="POST" id="cart" >
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="product_id" value="{{ $featured->id }}">
                                                        
                                                        <button class="site-button text-uppercase radius-sm font-weight-700 button-md" id="add_product" data-id="{{ $featured->id }}" style="display: flex;"> <span class="fa fa-cart-plus"></span></button>
                                                        
                                                        </form>
                                                                </div><br>
                                                            
                                                           

                                                              
                                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  "><span style="font-size: 1em;color:#ee001c !important; ">Special Price </span>EGP  {{$featured->offer}}</span>
                                                               
                                                            @else
                                                               
                                                                    <span style="color: #666 !important;font-weight: 600;font-family: inherit;font-size: 14px;  ">EGP  {{$featured->price}}</span> <div class="wt-post-readmore pull-right" style="display: inline-block; ">
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

                           
                        </div>
                    
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