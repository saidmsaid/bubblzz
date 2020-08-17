@extends('website.website')

@section('content')
	<div class="page-content">
		            <!-- OUR TESTIMONIAL SECTION START  -->
            <div class="section-full bg-gray bg-repeat p-t80 p-b120" >
            	<div class="container">
                    <!-- TITLE START-->
                    <div class="section-head text-center">
                        <h1><span class="text-primary text-center">Login or Create an Account</span></h1>
                        
                       
                    </div>
                    <!-- TITLE END-->
                    <div class="section-content">
                        <div class="owl-carousel home-carousel-1">
                            <div class="item" >
                                <div class="testimonial-5 bg-white radius-sm"  style="background-color: #ed65a2;padding-bottom: 6%;">
                                	<div class="testimonial-pic-block radius-bx"> 
                                    	
                                    </div>
                                    <div class="testimonial-text  text-center clearfix">
                                        <div class="testimonial-detail clearfix">
                                            <strong class="testimonial-name" style="color: white">New Customers</strong>
                                        </div>
                                        <div class="testimonial-paragraph" style="color: white">
                                            
                                            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.<br><br><br>
                                            </p>
                                        </div>
                                        <div type="submit" class="site-button skew-icon-btn radius-sm" style="background-color: white;color: #f24e97">
                                             <a href="{{url('/register')}}"  class="font-weight-700 inline-block text-uppercase p-lr15">
                                              Create an Account
                                        	</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item" >
                                <div class=" testimonial-5 bg-white radius-sm" style="background-color: #ed65a2;">
                                	<div class="testimonial-pic-block radius-bx"> 
                                    	
                                    </div>
                                    <div class="testimonial-text text-center clearfix" >
                                        <div class="testimonial-detail clearfix">
                                            <strong class="testimonial-name " style="color: white">Registered Customers</strong>
                                        </div>
                                        <div class="testimonial-paragraph" style="color: white">
                                            
                                            <p>If you have an account with us, please log in.
                                            </p>
                                            <form  method="POST" action="{{ route('login') }}">
                                             @csrf
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required="" placeholder="Email" value="{{ old('email') }}" required autofocus style="color: #f24e97">
                                                @if ($errors->has('email'))
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong style="color:white">{{ $errors->first('email') }}</strong>
				                                    </span>
				                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                                @if ($errors->has('password'))
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong style="color:white">{{ $errors->first('password') }}</strong>
				                                    </span>
				                                @endif
                                            </div>
                                            
                                            <button type="submit" class="site-button-secondry radius-sm" style="background-color: white;color: #f24e97">
                                              <span class="font-weight-700 inline-block text-uppercase p-lr15">Login</span> 
                                            </button>    
                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- OUR TESTIMONIAL SECTION END  --> 
	</div>
  <!-- FOOTER START -->
        <footer class="site-footer footer-dark">
@endsection('content')