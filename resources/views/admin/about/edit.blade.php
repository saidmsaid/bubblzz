@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/uniform.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-media.css')}}" />
@endsection
@section('title', 'Edit About')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->

        <!-- END: Subheader -->
        <div class="m-content">

        @include('admin.includes.message')
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                About
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('about.update', $about->id)}}" name="basic_validate" id="about_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Title</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="title" value="{{$about->title}}" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Arabic Title</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="title_ar" value="{{$about->title_ar}}" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">About</label>
                        <div class="controls">
                            <textarea name="about" id="required" class="custom-input" >{{$about->about}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ِArabic About</label>
                        <div class="controls">
                            <textarea name="about_ar" id="required" class="custom-input" >{{$about->about_ar}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                            <img src="/storage/about/{{$about->image}}" alt="About Image" style="max-width: 100px; max-height: 100px;">
                            <input type="file" name="image"><br>
                            <small>Notice: Max Size 8 M ,<em>small size helps to perform better</em> </small>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn m-btn--air btn-success" value="Save">
                        <a class="btn custom-button" href="{{route('about.index')}}">Cancel</a>
                        <input type="hidden" value="Put" name="_method">
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
    {{--<script src="{{asset('assets/demo/default/custom/header/actions.js')}}" type="text/javascript"></script>--}}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
    </script>
@endsection