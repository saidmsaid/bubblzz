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
            <!-- <div class="container">
    <div class="row">
        <section>
        <div class="wizard">
          
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="fa fa-address-book-o"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Step one</h3>
                        <p>first step</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step two</h3>
                        <p>Second step</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Step three</h3>
                        <p>Third step</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete steps</h3>
                        <p>You have successfully completed every steps.</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Submit</button></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div> -->
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


                                  <div class="stepy-tab">
                                  <ul id="default-titles" class="stepy-titles clearfix">
                                      <li id="default-title-0" class="current-step">
                                          <div>Step 1</div>
                                      </li>
                                      <li id="default-title-1" class="">
                                          <div>Step 2</div>
                                      </li>
                                      <li id="default-title-2" class="">
                                          <div>Step 3</div>
                                      </li>
                                  </ul>
                              </div>
                    <!-- SECTION CONTENT START -->
                    	<div class="section-content">
                            <!--- start form-->
                                  <form action="{{route('checkout.store')}}" method="POST" id="default">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" id="city_token">
                                @method('POST')
                                  <fieldset title="Step1" class="step" id="default-step-0">
                                      <legend> </legend>
                                     <div class="col-md-12 m-b30" style="background: transparent url(website/images/line-gradient.gif) no-repeat scroll right top;">
                                        
                                        <div class="section-head text-center">
                                            
                                            <h4 class="text-uppercase">Personal Details</h4>
                                             <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                                        </div>
                                        <div class="wt-box" >
                                       
                                <!-- FROM STYEL 1 -->
                                @guest
                        
                                 
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                         <input type="text" class="form-control required" name="name" placeholder="Full Name" value="{{old('name')}}" required="required" >
                                                          @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                             
                                            
                                             <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="email" name="order_email" class="form-control required email" placeholder="Enter email" value="{{old('order_email')}}" required="required">
                                                          @if ($errors->has('order_email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('order_email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                            
                                       
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control required number" name="mobile" placeholder="Enter Phone Number" value="{{old('mobile')}}"  required="required">
                                                         @if ($errors->has('mobile'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong style="color:#f24e97">{{ $errors->first('mobile') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                             
                                       <!--      </div> -->
                                            
                                         <div class="row">
                                             
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                         <select name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} required " required="required" id="state_id" data-dependent="state">
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
                                                       <select name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} required" required="required" id="city">
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
                                                <input type="text" class="form-control m-b30 required" name="address" placeholder="Address" value="{{old('address')}}" required="required">
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
                                            @else
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
                                             
                                            <!-- </div> -->
                                            
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
                                           
                                    @endguest    
                            <!--- end form-->
                                    </div>                    
                                </div>
                                  </fieldset>
                                
                                  
                                     <fieldset title="Step 2" class="step" id="default-step-1" >
                                      <legend> </legend>
                                      <div class="col-md-12 m-b30" style="background: transparent url(website/images/line-gradient.gif) no-repeat scroll left top;">
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
                                            <li id="discount_rate" style="display: none"><b> Discount rate</b><strong class="pull-right text-primary" id="discount_value" ></strong></li>
                                            <li><b> Cart Total</b><strong class="pull-right text-primary" id="cart_total" data-total="@guest {{$total}} @else {{$total + auth()->user()->city->city_shippingPrice}} @endguest">@guest {{$total }} EGP @else {{$total + auth()->user()->city->city_shippingPrice}} @endguest</strong></li>
                                        </ul>
                                       <div class="form-group">
                                        <label>Promo Code</label>
                                        <input type="text" class="form-control m-b30" name="coupon" placeholder="coupon" id="coupon" >
                                            <span class="invalid-feedback" role="alert" id="coupon_error">
                                                <strong style="color:#f24e97"></strong>
                                            </span>
                                        </div>
                                    </div>                    
                                        <input type="hidden"  name="code"  id="code" disabled="disabled">
                                </div>
                                  </fieldset>
                                   <fieldset title="Step 3" class="step" id="default-step-2" >
                                      <legend> </legend>
                                     <div class="col-md-12 m-b30">
                                    <div class="section-head text-center">
                                        <h4 class="text-capitalize ">Complete Order</h4>
                                        <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                                    </div>
                                    <div class="wt-box your-order-list">
                                        <ul>
                                             @if(count($cart) === 0)

                                             <li style="padding: 12px 10px;background-color: #f2f2f2">Your Cart Is Empty.</li>
                                           @else
                                             {{-- <li style="padding: 12px 10px;background-color: #f2f2f2">You Can Confirm to Complete Order.</li>--}}
                                             <li >Payment Method</li>
                                             <div class="form-group ">
                                                <div class="radio">
                                                    <input id="cash" name="payment_method"  type="radio"    >
                                                    <label for="cash">Cash On delivery</label>
                                                </div>
                                                 <div class="radio">
                                                    <input id="visa" name="payment_method"  type="radio"   onclick="Checkout.showLightbox();" >
                                                    <label for="visa">Visa</label>
                                                </div>
                                            </div>
                                            @endif
                                           
                                        </ul>
                                    </div>
                                </div>
                                  </fieldset>
                                    @if(count($cart) === 0)
                                     <a href="{{url('/')}}" class="finish site-button" />Continue Shopping</a>
                                            @else
                                            
                                            <button type="submit" value="submit" class="site-button finish">Confirm</button>
                                            @endif
                                 
                              </form>
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
@section('js')
<script type="text/javascript">
  $(document).ready(function () {
    $('#coupon').on('keyup',function(){
      var value     = $(this).val(),
        _token    = $('input[name="_token"]').val();
             
        $.ajax({
          url:"{{route('promoActive')}}",
          method:"POST",
          data:{value:value,_token:_token},
          success:function(result){
            if(result.status == true)
            {
              $('#cart_total').html(+$('#cart_total').data("total") - +$('#cart_total').data("total") * +result.coupon.code_value /100 +" EGP");  
              $("#discount_rate").show();
              $("#discount_value").text(result.coupon.code_value+"%");
              $("#coupon_error").html(` <strong style="color:#f24e97">${result.success}</strong>`);
              $('#code').prop("disabled", false);
              $('#code').val($('#coupon').val());
              $('#coupon').prop("disabled", true);
            }else{
              $("#coupon_error").html(` <strong style="color:#f24e97">${result.success}</strong>`);
            }
            
          },error: function (e) {} 
        });
    });
    $("#coupon").bind("paste", function(f){
    
      var value     = f.originalEvent.clipboardData.getData('text'),
        _token    = $('input[name="_token"]').val();
             
        $.ajax({
          url:"{{route('promoActive')}}",
          method:"POST",
          data:{value:value,_token:_token},
          success:function(result){
            if(result.status == true)
            {
              $('#cart_total').html(+$('#cart_total').data("total") - +$('#cart_total').data("total") * +result.coupon.code_value /100 +" EGP");  
              $("#discount_rate").show();
              $("#discount_value").text(result.coupon.code_value+"%");
              $("#coupon_error").html(` <strong style="color:#f24e97">${result.success}</strong>`);
              $('#code').prop("disabled", false);
              $('#code').val($('#coupon').val());
              $('#coupon').prop("disabled", true);
            }else{
              $("#coupon_error").html(` <strong style="color:#f24e97">${result.success}</strong>`);
            }
            
          },error: function (e) {} 
        });
    });
      });
</script>

 <script src="https://test-nbe.gateway.mastercard.com/checkout/version/56/checkout.js/"
                data-error="errorCallback"
                data-cancel="cancelCallback"
                 data-beforeRedirect="Authorization">
        </script>

        <script type="text/javascript">
            function errorCallback(error) {
                  console.log(JSON.stringify(error));
            }
            function cancelCallback() {
                  console.log('Payment cancelled');
            }

            Checkout.configure({
                merchant: 'EGPTEST1',
                order: {
                    amount: function() {
                        //Dynamic calculation of amount
                        return 80 + 20;
                    },
                    currency: 'USD',
                    description: 'Ordered goods',
                   id: '1'
                },
                interaction: {
                    operation: 'PURCHASE', // set this field to 'PURCHASE' for Hosted Checkout to perform a Pay Operation.
                    merchant: {
                        name: 'EGPTEST1',
                        address: {
                            line1: '200 Sample St',
                            line2: '1234 Example Town'            
                        }    
                    }
                }
                Authorization:{
                  apiUsername="merchant.EGPTEST1",
                  password = "61422445f6c0f954e24c7bd8216ceedf"
                }
            });
        </script>
        <script type="text/javascript">
            function Authorization() {
              var apiUsername="merchant.EGPTEST1",
                  password = "61422445f6c0f954e24c7bd8216ceedf"
                return {
                     xhr.setRequestHeader("Authorization", "Basic " + btoa(apiUsername + ":" + password)); 
                };
            }
        </script>
@endsection