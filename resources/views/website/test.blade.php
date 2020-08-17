@extends('website.website')

@section('content')
        <!-- CONTENT START -->
        <div class="page-content">
            
            
                
            <!-- BREADCRUMB ROW -->                            
            <div class="bg-gray-light p-tb20">
                <div class="container">
                    <ul class="wt-breadcrumb breadcrumb-style-1">
                        <li><a href="javascript:void(0);">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
            <!-- BREADCRUMB  ROW END --> 
                
            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">
            
				<!-- PRODUCT DETAILS -->
            	<div class="container woo-entry">
            	     @guest
               <a type="button" class="m-r15" data-toggle="modal" data-target="#Default-Modal">Already registered? Click here to login.  </a>
               @endguest
                     @if ($errors->has('message'))
                                 <div class="alert alert-danger">
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="font-weight: 400">{!! $errors->first('message') !!}</strong>
                                        </span>
                                 </div>
                            @endif
                    <!-- SECTION CONTENT START -->
                    	<div class="section-content">
                            
                                <!-- FROM STYEL 1 -->
                                @guest
                        
                                    <div class="col-md-4 m-b30" style="background: transparent url(website/images/line-gradient.gif) no-repeat scroll right top;">
                                        
                                        <div class="section-head text-center">
                                            
                                            <h4 class="text-uppercase">Personal Details</h4>
                                             <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                                        </div>
                                        <div class="wt-box" >
                                        <div class="m-b30">
                                 
                                <!-- TRIGGER THE MODAL WITH A BUTTON -->
                                
                                 @if ($errors->has('email'))
                                                        <br><span class="invalid-feedback" role="alert">
                                                            <strong >{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                    @if ($errors->has('password'))
                                                       <br> <span class="invalid-feedback" role="alert">
                                                            <strong >{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                <!-- MODAL -->
                                <div id="Default-Modal" class="modal fade" role="dialog" style="display: none;">
                                  <div class="modal-dialog" style="margin-top: 371.5px;">
                                    <!-- MODAL CONTENT-->
                                    <div class="modal-content">
                                      <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title text-white">Registered Customers</h4>
                                      </div>
                                      <div class="modal-body">
                                         <form  method="POST" action="{{ route('login') }}">
                                                 @csrf
                                                 @method('POST')
                                                <div class="form-group">
                                                    <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required="" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong >{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong >{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                <button type="submit" class="site-button-secondry radius-sm" style="background-color: #f24e97;color: #fff;">
                                                  <span class="font-weight-700 inline-block text-uppercase p-lr15">Login</span> 
                                                </button>    
                                            </form><br>
                                            <small> <a href="{{url('/register')}}"  class="font-weight-700 inline-block text-uppercase " style="color: #f24e97">
                                              Create an Account
                                            </a></small>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="site-button " data-dismiss="modal">Close
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="wt-divider bg-gray-dark"><i class="icon-dot c-square"></i></div>
                            </div>
                            <!--- start form-->
                                <form action="{{route('checkout.store')}}" method="POST" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}" id="city_token">
                                @method('POST')
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                         <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{old('name')}}" required="required" >
                                                          @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                             
                                            
                                             <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="email" name="order_email" class="form-control" placeholder="Enter email" value="{{old('order_email')}}" required="required">
                                                          @if ($errors->has('order_email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('order_email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                            
                                       
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control" name="mobile" placeholder="Enter Phone Number" value="{{old('mobile')}}"  required="required">
                                                         @if ($errors->has('mobile'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('mobile') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                             
                                            </div>
                                            
                                         <div class="row">
                                             
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                         <select name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} " required="required" id="state_id" data-dependent="state">
                                                            <option disabled="disabled" selected="selected" value="">Choose Your State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{$state->state_id}}" 
                                                              >{{$state->state_name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('state'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('state') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                   <div class="form-group" >
                                                   <label>City</label>
                                                       <select name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} " required="required" id="city">
                                                            <option disabled="disabled" selected="selected" >Choose Your City</option>
                                                            {{--@foreach($cities as $city)
                                                            <option value="{{$city->city_id}}"   @if(old('city') == $city->city_id)
                                                           {{"selected"}}
                                                        @endif>{{$city->city_name}}</option>
                                                            @endforeach--}}
                                                    </select>
                                                    @if ($errors->has('city'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color:#f24e97">{{ $errors->first('city') }}</strong>
                                                        </span>
                                                    @endif
                                                
                                            </div>
                                                </div>
                                                                                         </div>

                                           
                                        
                                            
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control m-b30" name="address" placeholder="Address" value="{{old('address')}}" required="required">
                                                 @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:#f24e97">{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                               
                                            </div>
                                            
                                            <div class="form-group ">
                                                <div class="radio">
                                                    <input id="account" name="account" value="{{TRUE}}" type="checkbox" @if(old('account') !== null) checked="checked" @endif>
                                                    <label for="account">Create an account for later use</label>
                                                </div>
                                                 @if ($errors->has('account_password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:#f24e97">{{ $errors->first('account_password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="row" id="account_info" @if(old('account') !== null) style="display: block" @endif>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group" >
                                                             <input id="password" type="password" class="form-control{{ $errors->has('account_password') ? ' is-invalid' : '' }}" name="account_password"  placeholder="{{ __('Password') }}">

                                                           
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group" >
                                                              <input id="password-confirm" type="password" class="form-control" name="account_password_confirmation"  placeholder="{{ __('Confirm Password') }}">

                                                            
                                                        </div>
                                                    </div>
                                            </div>
                                         
                                            @if(count($cart) === 0)
                                            @else
                                            <button type="submit" value="submit" class="site-button">Confirm</button>
                                            @endif
                                            
                                        </form>
                            <!--- end form-->
                                            
                                           
                                           
                                       
                                       
                                        </div>
                                    </div>
                                @else
                                <div class="col-md-4 m-b30" style="background: transparent url(website/images/line-gradient.gif) no-repeat scroll right top;">
                                    <div class="section-head text-center">
                                        <h4 class="text-capitalize">Personal Details</h4>
                                       <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                                    </div>
                                    
                                    <div class="wt-box">
                                                                 <!--- start form-->
                                <form action="{{route('checkout.store')}}" method="POST" >
                                @csrf
                                @method('POST')
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                         <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ Auth::user()->name }}" required="required" disabled="disabled">
                                                          @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                             
                                            
                                             <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="email" name="order_email" class="form-control" placeholder="Enter email" value="{{ Auth::user()->email }}" required="required" disabled="disabled">
                                                          @if ($errors->has('order_email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('order_email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                            
                                       
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control" name="mobile" placeholder="Enter Phone Number" value="{{ Auth::user()->mobile }}"  required="required" disabled="disabled">
                                                         @if ($errors->has('mobile'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('mobile') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                             
                                            </div>
                                            
                                         <div class="row">
                                             
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                         <select name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} " required="required" disabled="disabled">
                                                            <option disabled="disabled" selected="selected" >Choose Your State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{$state->state_id}}" 
                                                                @if(Auth::user()->state_id == $state->state_id)
                                                           {{"selected"}}
                                                        @endif >{{$state->state_name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('state'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('state') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                   <div class="form-group" >
                                                   <label>City</label>
                                                       <select name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} " required="required" disabled="disabled">
                                                            <option disabled="disabled" selected="selected"  >Choose Your City</option>
                                                             @foreach($cities as $city)
                                                            <option value="{{$city->city_id}}"   @if(Auth::user()->city_id == $city->city_id)
                                                           {{"selected"}}
                                                        @endif>{{$city->city_name}}</option>
                                                            @endforeach
                                                    </select>
                                                    @if ($errors->has('city'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color:#f24e97">{{ $errors->first('city') }}</strong>
                                                        </span>
                                                    @endif
                                                
                                            </div>
                                                </div>
                                         </div>
                                           
                                        
                                            
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control m-b30" name="address" placeholder="Address" value="{{Auth::user()->address1}}" required="required" disabled="disabled">
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:#f24e97">{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-inline">
                                                <div class="radio">
                                                    <input id="another" name="anotheraddress" value="{{true}}" type="checkbox"  @if(old('anotheraddress') !== null) checked="checked" @endif >
                                                    <label for="another">Ship to the another address</label>
                                                </div>
                                            </div>
                                             <div  id="otheradd"  @if(old('anotheraddress') !== null) style="display: block" @endif>
                                             <div class="row">
                                                      <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                         <select name="state_id" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} "  id="state_id" data-dependent="state">
                                                            <option disabled="disabled" selected="selected" value="">Choose Your State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{$state->state_id}}" 
                                                              >{{$state->state_name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('state'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('state') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                   <div class="form-group" >
                                                   <label>City</label>
                                                       <select name="city_id" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} "  id="city">
                                                            <option disabled="disabled" selected="selected" >Choose Your City</option>
                                                            {{--@foreach($cities as $city)
                                                            <option value="{{$city->city_id}}"   @if(old('city') == $city->city_id)
                                                           {{"selected"}}
                                                        @endif>{{$city->city_name}}</option>
                                                            @endforeach--}}
                                                    </select>
                                                    @if ($errors->has('city'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color:#f24e97">{{ $errors->first('city') }}</strong>
                                                        </span>
                                                    @endif
                                                
                                            </div>
                                                </div>
                                                 </div>
                                                <div class="form-group">      
                                                    <label >Other Address</label>
                                                    <input type="text" class="form-control" placeholder="Other Address "  name="shipaddress">
                                                      @if ($errors->has('shipaddress'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color:#f24e97">{{ $errors->first('shipaddress') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                         
                                            @if(count($cart) === 0)
                                            @else
                                            
                                            <button type="submit" value="submit" class="site-button">Confirm</button>
                                            @endif
                                            
                                        </form>
                            <!--- end form-->
                                    </div>                    
                                </div>
                                @endguest
                                 <div class="col-md-4 m-b30">
                                    <div class="section-head text-center">
                                        <h4 class="text-capitalize ">Payment</h4>
                                        <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                                    </div>
                                    <div class="wt-box your-order-list">
                                        <ul>
                                            <li style="padding: 12px 10px;background-color: #f2f2f2">Cash On Delivery</li>
                                        </ul></div>
                                </div>
                                <!-- FROM STYEL 1 WITH ICON -->
                                <div class="col-md-4 m-b30" style="background: transparent url(website/images/line-gradient.gif) no-repeat scroll left top;">
                                    <div class="section-head text-center">
                                        <h4 class="text-capitalize">Review your order</h4>
                                       <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                                    </div>
                                    <div class="wt-box your-order-list">
                                    	<ul>
                                        @foreach($cart as $carts)
                                        	<li id="{{$carts->id}}">{{$carts->product()->first()->name}} <br><strong class="pull-right text-primary" >
                                            @if($carts->product()->first()->offer !== '0')
                                                {{"$carts->quantity X ".$carts->product()->first()->offer}}.00
                                            @else
                                                {{ "$carts->quantity X ".$carts->product()->first()->price}}.00
                                            @endif
                                             EGP</strong></li>
                                            @endforeach
                                            
                                            
                                            <li><b> Cart Subtotal</b><strong class="pull-right text-primary"  id="cart_subtotal" data-subtotal = "{{$total }}">{{$total }} EGP</strong></li>
                                             <li><b> Shipping Cost</b><strong class="pull-right text-primary" id="shipping_price">@guest 0.00 EGP @else {{auth()->user()->city->city_shippingPrice}} @endguest</strong></li>
                                            <li><b> Cart Total</b><strong class="pull-right text-primary" id="cart_total" >@guest {{$total }} EGP @else {{$total + auth()->user()->city->city_shippingPrice}} @endguest</strong></li>
                                        </ul>
                                    </div>                    
                                </div>
                               
                                
                            </div>
                    <!-- SECTION CONTENT END -->                    
                    
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