@extends('admin.layouts.app')
@section('title', 'Create Home Image')
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
                                Add Image
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('imageslider.store')}}" name="basic_validate" id="imageSlider_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Text</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="text" id="required" value="{{old('text')}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Arabic Text</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="text_ar" id="required" value="{{old('text_ar')}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="description" id="required"  value="{{old('description')}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Arabic Description</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="description_ar" id="required" value="{{old('description_ar')}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Order</label>
                        <div class="controls">
                            <select class="custom-selectBox" name="order">
                                <option value="1">1</option>
                                @for($i = 2;$i <= $imageSliders->count() + 1; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                            <input type="file" name="image"><br>
                            <small>Notice: Max Size 8 M ,<em>small size helps to perform better</em> </small>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Create" class="btn m-btn--air btn-success">
                        <a class="btn custom-button" href="{{route('imageslider.index')}}">Cancel</a>
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