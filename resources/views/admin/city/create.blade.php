@extends('admin.layouts.app')
@section('title', 'Create City')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/uniform.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-media.css')}}" />
@endsection
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">

        @include('admin.includes.message')
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Create New City
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('city.store')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">City Name</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="city_name" value="{{old('city_name')}}" id="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Shipping Price</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="city_shippingPrice" value="{{old('city_shippingPrice')}}" id="required">
                        </div>
                    </div>
                   
                    <div class="control-group">
                        <label class="control-label">State </label>


                        <div class="controls">
                            
                                
                                
                                <select name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} custom-selectBox" required="required" >
                                                            <option disabled="disabled" selected="selected" >Choose Your State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{$state->state_id}}" 
                                                                @if(old('state') == $state->state_id)
                                                           {{"selected"}}
                                                        @endif >{{$state->state_name}}</option>
                                                            @endforeach
                                                        </select>
                           
                        </div>
                    </div>
                    
                  
                    <div class="form-actions">
                        <input type="submit" value="Create" class="btn m-btn--air btn-success">
                        <a class="btn custom-button" href="{{route('city.index')}}">Cancel</a>
                    </div>
                </form>
                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>


@endsection
@section('script')
    <script src="{{asset('assets/demo/demo12/custom/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>
@endsection