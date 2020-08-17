@extends('website.website')
@section('content')
<div class="page-content" style="margin-bottom: 30px;background-image:url({{asset('website/images/background/19.jpg')}});background-repeat:no-repeat;    background-size: cover;
    
}">
	            <!-- CONTACT US SECTION END  --> 
			<div class="section-full overlay-wraper " data-stellar-background-ratio="0.2"  >
            	<div class="overlay-main "></div>
                <div class="container">
 
                        <div class="row conntact-home  bdr-gray-light">
                            <div class="col-md-5 col-md-offset-8 col-sm-12 ">
                            	<div class="section-content p-tb30 overlay-wraper">
                                	<div class="overlay-main opacity-09" /*style="background-image:url({{asset('website/images/background/19.jpg')}})"*/></div>	
                                      <div class="p-a30 bg-white text-center" style="z-index:1; position:relative">
                                       
                                      	<form  method="POST" action="{{ route('register') }}">
                                      		@csrf
                                        	<div class="form-group">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ __('Name') }}">
                                                @if ($errors->has('name'))
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong style="color:#f24e97">{{ $errors->first('name') }}</strong>
				                                    </span>
				                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}">

				                                @if ($errors->has('email'))
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong style="color:#f24e97">{{ $errors->first('email') }}</strong>
				                                    </span>
				                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Password') }}">

				                                @if ($errors->has('password'))
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong style="color:#f24e97">{{ $errors->first('password') }}</strong>
				                                    </span>
				                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ __('Confirm Password') }}">
                                            </div>
                                            <div class="form-group">
                                                <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required placeholder="{{ __('Mobile') }}">

                                                @if ($errors->has('mobile'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:#f24e97">{{ $errors->first('mobile') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input id="address" type="textarea" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required placeholder="{{ __('Address') }}">

				                                @if ($errors->has('address'))
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong style="color:#f24e97">{{ $errors->first('address') }}</strong>
				                                    </span>
				                                @endif
                                            </div>
                                            <div class="form-group">
                                               <select name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} selectpicker" required="required" >
                                                            <option disabled="disabled" selected="selected" >Choose Your State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{$state->state_id}}" 
                                                                @if(old('state') == $state->state_id)
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

                                            <div class="form-group" >
                                               <!-- <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required value="{{ old('city') }}" placeholder="{{ __('City') }}">-->
                                                <select name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} selectpicker" required="required" >
                                                            <option disabled="disabled" selected="selected" >Choose Your City</option>
                                                             @foreach($cities as $city)
                                                            <option value="{{$city->city_id}}"   @if(old('city') == $city->city_id)
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
                                            <button type="submit" class="site-button-secondry radius-sm " style="background-color: #f24e97;color: white">
                                              <span class="font-weight-700 inline-block text-uppercase p-lr15">{{ __('Register') }}</span> 
                                            </button>    
                                        </form>
                                      </div>                             
                                </div>
                            </div>                        
                        	<!--<div class="col-md-7 col-sm-7 contact-home4-right p-t130 p-b50" >
                            	<div class="section-content">
                                	<div class="opening-block bdr-5 bdr-primary p-a40 text-right">
                                    	<a href="{{url('/')}}" class="bg-primary book-now-btn p-tb5 p-lr15 text-uppercase font-16 font-weight-500">BUBBLZZ</a>
                                        <img src="{{asset('website/images/18.jpg')}}">
                                    </div>
                                </div>                               
                            </div>-->
                        </div>
                    
                </div>
                
            </div> 
            <!-- CONTACT US OFFER SECTION END  --> 
 
            </div>
  <!-- FOOTER START -->
        <footer class="site-footer footer-dark">
@endsection