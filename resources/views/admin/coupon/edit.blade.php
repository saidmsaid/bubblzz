@extends('admin.layouts.app')
@section('title', 'Edit Coupon')
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
                                Edit Coupon
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('coupon.update',$coupon->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Coupon Code</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="code"  value="{{$coupon->code}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Coupon Percentage</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="code_value"  value="{{$coupon->code_value}}">
                        </div>
                    </div>
                   <div class="control-group">
                            <label class="control-label">Coupon Status</label>
                            <div class="controls">
                                <select class="form-control m-input custom-selectBox" name="status">
                                    <option value="">Select Status</option>
                                    <option value="approved" @if($coupon->status == 'approved') {{"selected"}} @endif>Approved</option>
                                    <option value="suspended" @if($coupon->status == 'suspended') {{"selected"}} @endif>Suspended</option>
                                   
                                </select>
                                <span class="m-form__help">Please select an option.</span>
                            </div>
                        </div>
                   
                   
                    <div class="form-actions">
                        <input type="hidden" value="PUT" name="_method">
                        <input type="submit" value="Update" class="btn m-btn--air btn-success">
                        <a class="btn custom-button" href="{{route('coupon.index')}}">Cancel</a>
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