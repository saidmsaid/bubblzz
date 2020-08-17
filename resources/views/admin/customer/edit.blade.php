@extends('admin.layouts.app')
@section('title', 'Edit Customer')
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
                                Edit Customer
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="form-horizontal" method="post" action="{{route('customer.update', $customer->id)}}" name="basic_validate" id="imageSlider_validate" novalidate="novalidate">
                    @csrf

                    <div class="control-group">
                        <label class="control-label">Name *</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="name" id="required" value="{{$customer->name}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email *</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="email" id="required" value="{{$customer->email}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mobile *</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="mobile" id="required" value="{{$customer->mobile}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Address 1 *</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="address1" id="required" value="{{$customer->address1}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Address 2</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="address2" id="required" value="{{$customer->address2}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Address 3</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="address3" id="required" value="{{$customer->address3}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Address 4</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="address4" id="required" value="{{$customer->address4}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">State *</label>
                        <div class="controls">
                              <select name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} custom-selectBox" required="required" >
                                                            <option disabled="disabled" selected="selected" >Choose Your State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{$state->state_id}}" 
                                                                @if($customer->state_id == $state->state_id)
                                                           {{"selected"}}
                                                        @endif >{{$state->state_name}}</option>
                                                            @endforeach
                                                        </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">City *</label>
                        <div class="controls">
                            <select name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} custom-selectBox" required="required" >
                                                            <option disabled="disabled" selected="selected" >Choose Your City</option>
                                                             @foreach($cities as $city)
                                                            <option value="{{$city->city_id}}"   @if($customer->state_id == $city->city_id)
                                                           {{"selected"}}
                                                        @endif>{{$city->city_name}}</option>
                                                            @endforeach
                                                    </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Save" class="btn m-btn--air btn-success">
                        <input type="hidden" value="PUT" name="_method">
                        <a class="btn custom-button" href="{{route('customer.index')}}">Cancel</a>
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