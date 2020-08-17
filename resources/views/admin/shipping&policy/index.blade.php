@extends('admin.layouts.app')
@section('title', 'Shipping & Policies')
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
                                Shipping & Policies
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('shipping.policies.update')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Shipping Title</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="shipping_title" value="{{$terms->shipping_title}}" id="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Shipping Text</label>
                        <div class="controls">
                           <textarea class="custom-input" type="text" name="shipping_text" id="required" rows="10">{{$terms->shipping_text}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Policies Title</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="policies_title" value="{{$terms->policies_title}}" id="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Policies Text</label>
                        <div class="controls">
                           <textarea class="custom-input" type="text" name="policies_text" id="required" rows="10">{{$terms->policies_text}}</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" value="PUT" name="_method">
                        <input type="submit" value="Update" class="btn m-btn--air btn-success">
                       
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